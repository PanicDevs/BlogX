<?php

namespace Modules\User\Entities;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\MCF\UserMCF;

class User extends Authenticatable implements FilamentUser, HasName
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserMCF::EMAIL,
        UserMCF::USERNAME,
        UserMCF::PASSWORD,
        UserMCF::AVATAR,
        UserMCF::FIRST_NAME,
        UserMCF::LAST_NAME,
        UserMCF::FULL_NAME,
        UserMCF::BIO,
        UserMCF::MESSAGE,
        UserMCF::ACCOUNT_TYPE,
        UserMCF::ACCOUNT_STATUS,
        UserMCF::LIMITATION_END_DATE,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserMCF::PASSWORD,
        UserMCF::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserMCF::ACCOUNT_TYPE        => AccountType::class,
        UserMCF::ACCOUNT_STATUS      => AccountStatus::class,
        UserMCF::LIMITATION_END_DATE => 'datetime',
    ];

    /**
     * Set filament panel access policy
     *
     * @return bool
     */
    public function canAccessFilament(): bool
    {
        return in_array(
                $this->getAttribute(UserMCF::ACCOUNT_TYPE),
                [AccountType::Admin, AccountType::Blogger],
            )
            && $this->getAttribute(UserMCF::ACCOUNT_STATUS) === AccountStatus::Free;
    }

    /**
     * Get filament user display name
     *
     * @return string
     */
    public function getFilamentName(): string
    { 
        return "$this->getAttribute(UserMCF::FULL_NAME)";
    }
}
