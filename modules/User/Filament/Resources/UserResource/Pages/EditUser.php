<?php

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Modules\User\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Throwable;

class EditUser extends EditRecord
{
    /**
     * Related Resource
     *
     * @var string $resource
     */
    protected static string $resource = UserResource::class;

    /**
     * Get the actions
     *
     * @return array
     *
     * @throws Throwable
     */
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
