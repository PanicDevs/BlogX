<?php

use Modules\User\Contracts\UserRepository;

if (! function_exists('user'))
{
    /**
     * Get the user repo.
     *
     * @return UserRepository
     */
    function user(): UserRepository
    {
        return resolve(UserRepository::class);
    }
}
