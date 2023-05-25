<?php

namespace Modules\User\Entities;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\Fields\UserFields;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements FilamentUser, HasName, HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserFields::EMAIL,
        UserFields::USERNAME,
        UserFields::PASSWORD,
        UserFields::FIRST_NAME,
        UserFields::LAST_NAME,
        UserFields::FULL_NAME,
        UserFields::BIO,
        UserFields::MESSAGE,
        UserFields::ACCOUNT_TYPE,
        UserFields::ACCOUNT_STATUS,
        UserFields::LIMITATION_END_DATE,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserFields::PASSWORD,
        UserFields::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserFields::ACCOUNT_TYPE        => AccountType::class,
        UserFields::ACCOUNT_STATUS      => AccountStatus::class,
        UserFields::LIMITATION_END_DATE => 'datetime',
    ];

    /**
     * Set filament panel access policy
     *
     * @return bool
     */
    public function canAccessFilament(): bool
    {
        return in_array(
                $this->getAttribute(UserFields::ACCOUNT_TYPE),
                [AccountType::Admin, AccountType::Blogger],
            )
            && $this->getAttribute(UserFields::ACCOUNT_STATUS) === AccountStatus::Free;
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
