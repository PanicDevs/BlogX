<?php

namespace Modules\User\Entities;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\DTO\UserDTO;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;

class User extends Authenticatable implements FilamentUser, HasName
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserDTO::EMAIL,
        UserDTO::PASSWORD,
        UserDTO::AVATAR_IMAGE_URL,
        UserDTO::FIRST_NAME,
        UserDTO::LAST_NAME,
        UserDTO::FULL_NAME,
        UserDTO::BIO,
        UserDTO::MESSAGE,
        UserDTO::ACCOUNT_TYPE,
        UserDTO::ACCOUNT_STATUS,
        UserDTO::LIMITATION_END_DATE,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserDTO::PASSWORD,
        UserDTO::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserDTO::ACCOUNT_TYPE        => AccountType::class,
        UserDTO::ACCOUNT_STATUS      => AccountStatus::class,
        UserDTO::LIMITATION_END_DATE => 'datetime',
    ];

    /**
     * Set filament panel access policy
     *
     * @return bool
     */
    public function canAccessFilament(): bool
    {
        return in_array(
                $this->getAttribute(UserDTO::ACCOUNT_TYPE),
                [AccountType::Admin, AccountType::Blogger],
            )
            && $this->getAttribute(UserDTO::ACCOUNT_STATUS) === AccountStatus::Free;
    }

    /**
     * Get filament user display name
     *
     * @return string
     */
    public function getFilamentName(): string
    {
        return "$this->first_name $this->last_name";
    }
}
