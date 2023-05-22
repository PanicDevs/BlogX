<?php

namespace Modules\User\Repositories;

use Modules\User\Contracts\UserRepository;
use Modules\User\Entities\User;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

class UserEloquentRepository extends BaseRepository implements CacheableInterface, UserRepository
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Get system user id.
     *
     * @return int
     */
    public function sys_id(): int
    {
        return 1;
    }
}
