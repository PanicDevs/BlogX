<?php

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Modules\Filament\Contracts\ExportableSchema;
use Modules\Filament\Traits\WithResourceHelper;
use Modules\User\Entities\User;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\Filament\Resources\UserResource\Pages;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Modules\User\MCF\UserMCF;
use Modules\User\Schema\UserSchema;
use Throwable;

class UserResource extends Resource implements ExportableSchema
{
    use WithResourceHelper;

    /**
     * Resource Model Class
     *
     * @var ?string $model
     */
    protected static ?string $model = User::class;

    /**
     * Form Schema
     *
     * @param Form $form
     *
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form->schema([Card::make(self::formSchema())->columns()]);
    }

    /**
     * Table Schema
     *
     * @param Table $table
     *
     * @return Table
     *
     * @throws Throwable
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::tableSchema())
            ->filters(self::tableFilters())
            ->actions(self::tableActions())
            ->bulkActions(self::tableBulkActions());
    }

    /**
     * Get the form schema
     *
     * @param ?string $section
     *
     * @return array
     */
    public static function formSchema(string $section = null): array
    {
        return match ($section)
        {
            UserSchema::PERSONAL_INFO => self::personalInfoSchema(),
            UserSchema::ACCOUNT_INFO  => self::accountInfoSchema(),
            UserSchema::ACCOUNT_TYPE  => self::accountTypeSchema(),
            default                   => self::allSchema(),
        };
    }

    /**
     * Personal Info Schema
     *
     * @return array
     */
    private static function personalInfoSchema(): array
    {
        return [
            FileUpload::make(UserMCF::AVATAR)
                      ->image()
                      ->avatar()
                      ->columnSpanFull(),

            TextInput::make(UserMCF::FIRST_NAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->required(),

            TextInput::make(UserMCF::LAST_NAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->required(),

            RichEditor::make(UserMCF::BIO)
                      ->autoLabel()
                      ->autoPlaceholder()
                      ->columnSpanFull(),
        ];
    }

    /**
     * Account info schema
     *
     * @return array
     */
    private static function accountInfoSchema(): array
    {
        return [
            TextInput::make(UserMCF::USERNAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->alpha()
                     ->unique(ignoreRecord: true)
                     ->autocomplete('new-username')
                     ->required(),

            TextInput::make(UserMCF::EMAIL)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->email()
                     ->unique(ignoreRecord: true)
                     ->autocomplete('new-email')
                     ->required(),

            TextInput::make(UserMCF::PASSWORD)
                     ->autoLabel()
                     ->autoPlaceholder()
                // ->required()
                     ->confirmed(UserMCF::PASSWORD_CONFIRMED)
                     ->autocomplete('new-password')
                     ->password(),

            TextInput::make(UserMCF::PASSWORD_CONFIRMED)
                     ->autoLabel()
                     ->autoPlaceholder()
                // ->required()
                     ->autocomplete('new-password-confirmation')
                     ->password(),
        ];
    }

    /**
     * Account type schema
     *
     * @return array
     */
    private static function accountTypeSchema(): array
    {
        return [
            Select::make(UserMCF::ACCOUNT_TYPE)
                  ->autoLabel()
                  ->autoPlaceholder()
                  ->options(AccountType::pairs())
                  ->disablePlaceholderSelection()
                  ->searchable(),

            Select::make(UserMCF::ACCOUNT_STATUS)
                  ->autoLabel()
                  ->autoPlaceholder()
                  ->options(AccountStatus::pairs())
                  ->searchable(),
        ];
    }

    /**
     * All Schema
     *
     * @return array
     */
    private static function allSchema(): array
    {
        return array_merge(self::personalInfoSchema(), self::accountInfoSchema(), self::accountTypeSchema());
    }

    /**
     * Get the table schema
     *
     * @return array
     */
    public static function tableSchema(): array
    {
        return [
            ImageColumn::make(UserMCF::AVATAR)
                       ->toggleable()
                       ->circular(),

            TextColumn::make(UserMCF::FIRST_NAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserMCF::LAST_NAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserMCF::USERNAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserMCF::EMAIL)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            BadgeColumn::make(UserMCF::ACCOUNT_TYPE)
                       ->autoLabel()
                       ->formatStateUsing(fn(Model $record) => $record->getAttribute(UserMCF::ACCOUNT_TYPE)->trans())
                       ->color(fn(Model $record) => $record->getAttribute(UserMCF::ACCOUNT_TYPE)->color()),

            BadgeColumn::make(UserMCF::ACCOUNT_STATUS)
                       ->autoLabel()
                       ->formatStateUsing(fn(Model $record) => $record->getAttribute(UserMCF::ACCOUNT_STATUS)->trans())
                       ->color(fn(Model $record) => $record->getAttribute(UserMCF::ACCOUNT_STATUS)->color()),

            TextColumn::make(UserMCF::CREATED_AT)
                      ->autoLabel()
                      ->date()
                      ->toggledHiddenByDefault()
                      ->toggleable(),

            TextColumn::make(UserMCF::UPDATED_AT)
                      ->autoLabel()
                      ->date()
                      ->toggledHiddenByDefault()
                      ->toggleable(),
        ];
    }

    /**
     * Get the table filters
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableFilters(): array
    {
        return [];
    }

    /**
     * Get the table actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
        ];
    }

    /**
     * Get the table bulk actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    /**
     * Resource Relations
     *
     * @return array
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Resource Pages
     *
     * @return array
     */
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
