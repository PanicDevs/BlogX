<?php

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload as FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn as ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;
use Modules\Filament\Contracts\ExportableSchema;
use Modules\Filament\Enums\Context;
use Modules\Filament\Traits\WithResourceHelper;
use Modules\User\Entities\User;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\Filament\Resources\UserResource\Pages;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Modules\User\Fields\UserFields;
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
            FileUpload::make(UserFields::AVATAR)
                      ->collection(UserFields::AVATAR)
                      ->image()
                      ->avatar()
                      ->columnSpanFull(),

            TextInput::make(UserFields::FIRST_NAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->required(),

            TextInput::make(UserFields::LAST_NAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->required(),

            RichEditor::make(UserFields::BIO)
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
            TextInput::make(UserFields::USERNAME)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->preventAutocomplete()
                     ->alpha()
                     ->unique(ignoreRecord: true)
                     ->required(),

            TextInput::make(UserFields::EMAIL)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->preventAutocomplete()
                     ->email()
                     ->unique(ignoreRecord: true)
                     ->required(),

            TextInput::make(UserFields::PASSWORD)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->requiredOn(Context::Create)
                     ->nullable(fn($context) => $context == 'edit')
                     ->preventAutocomplete()
                     ->confirmed(UserFields::PASSWORD_CONFIRMED)
                     ->password(),

            TextInput::make(UserFields::PASSWORD_CONFIRMED)
                     ->autoLabel()
                     ->autoPlaceholder()
                     ->requiredOn(Context::Create)
                     ->nullable(fn($context) => $context == 'edit')
                     ->preventAutocomplete()
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
            Select::make(UserFields::ACCOUNT_TYPE)
                  ->autoLabel()
                  ->autoPlaceholder()
                  ->options(AccountType::pairs())
                  ->disablePlaceholderSelection()
                  ->searchable(),

            Select::make(UserFields::ACCOUNT_STATUS)
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
            ImageColumn::make(UserFields::AVATAR)
                       ->autoLabel()
                       ->collection(UserFields::AVATAR)
                       ->toggleable()
                       ->circular(),

            TextColumn::make(UserFields::FIRST_NAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserFields::LAST_NAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserFields::USERNAME)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            TextColumn::make(UserFields::EMAIL)
                      ->autoLabel()
                      ->searchable()
                      ->sortable(),

            BadgeColumn::make(UserFields::ACCOUNT_TYPE)
                       ->autoLabel()
                       ->formatStateUsing(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_TYPE)->trans())
                       ->color(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_TYPE)->color()),

            BadgeColumn::make(UserFields::ACCOUNT_STATUS)
                       ->autoLabel()
                       ->formatStateUsing(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_STATUS)->trans())
                       ->color(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_STATUS)->color()),

            TextColumn::make(UserFields::CREATED_AT)
                      ->autoLabel()
                      ->date()
                      ->toggledHiddenByDefault()
                      ->toggleable(),

            TextColumn::make(UserFields::UPDATED_AT)
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
        return [
            SelectFilter::make(UserFields::ACCOUNT_TYPE)
                        ->options(AccountType::pairs())
                        ->searchable(),

            SelectFilter::make(UserFields::ACCOUNT_STATUS)
                        ->options(AccountStatus::pairs())
                        ->searchable(),
        ];
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
            Action::make('Limit')
                  ->action(
                      function (Model $record, array $data)
                      {
                          $record->setAttribute(UserFields::MESSAGE, $data[UserFields::MESSAGE]);
                          $record->setAttribute(UserFields::LIMITATION_END_DATE, $data[UserFields::LIMITATION_END_DATE]);
                          $record->setAttribute(UserFields::ACCOUNT_STATUS, AccountStatus::Limited);
                          $record->save();
                      },
                  )
                  ->icon('heroicon-s-ban')
                  ->form(
                      [
                          DateTimePicker::make(UserFields::LIMITATION_END_DATE),
                          Textarea::make(UserFields::MESSAGE),
                      ],
                  )
                  ->hidden(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_STATUS) == AccountStatus::Limited)
                  ->requiresConfirmation(),

            Tables\Actions\Action::make('Rescue')
                                 ->color('success')
                                 ->action(
                                     function (Model $record)
                                     {
                                         $record->setAttribute(UserFields::MESSAGE, null);
                                         $record->setAttribute(UserFields::LIMITATION_END_DATE, null);
                                         $record->setAttribute(UserFields::ACCOUNT_STATUS, AccountStatus::Free);
                                         $record->save();
                                     },
                                 )
                                 ->icon('heroicon-o-check-circle')
                                 ->hidden(fn(Model $record) => $record->getAttribute(UserFields::ACCOUNT_STATUS) != AccountStatus::Limited)
                                 ->requiresConfirmation(),
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
