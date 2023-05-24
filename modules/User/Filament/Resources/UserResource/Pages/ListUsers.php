<?php

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Modules\User\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Throwable;

class ListUsers extends ListRecords
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
            Actions\CreateAction::make(),
        ];
    }
}
