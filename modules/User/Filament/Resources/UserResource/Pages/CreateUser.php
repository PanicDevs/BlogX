<?php

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Resources\Form;
use Modules\User\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    /**
     * Related Resource
     *
     * @var string $resource
     */
    protected static string $resource = UserResource::class;

    protected function form(Form $form): Form
    {
        return $form->schema(UserResource::formSchema());
    }
}
