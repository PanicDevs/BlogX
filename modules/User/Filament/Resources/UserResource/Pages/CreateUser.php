<?php

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Modules\User\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Modules\User\Schema\UserSchema;

class CreateUser extends CreateRecord
{
    use HasWizard;

    /**
     * Related Resource
     *
     * @var string $resource
     */
    protected static string $resource = UserResource::class;

    /**
     * Creation wizard steps
     *
     * @return array
     */
    protected function getSteps(): array
    {
        return [
            Step::make(UserSchema::PERSONAL_INFO)
                ->autoLabel()
                ->icon('heroicon-s-information-circle')
                ->schema(self::stepSchema(UserSchema::PERSONAL_INFO)),

            Step::make(UserSchema::ACCOUNT_INFO)
                ->autoLabel()
                ->icon('heroicon-s-finger-print')
                ->schema(self::stepSchema(UserSchema::ACCOUNT_INFO)),

            Step::make(UserSchema::ACCOUNT_TYPE)
                ->autoLabel()
                ->icon('heroicon-s-key')
                ->schema(self::stepSchema(UserSchema::ACCOUNT_TYPE)),
        ];
    }

    /**
     * Get the step schema
     *
     * @param string $section
     *
     * @return array
     */
    private static function stepSchema(string $section): array
    {
        return [
            Card::make()
                ->columns()
                ->schema(UserResource::formSchema($section)),
        ];
    }
}
