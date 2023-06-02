<?php

namespace Modules\User\Fields;

class UserFields
{
    public const EMAIL               = 'email';
    public const USERNAME            = 'username';
    public const PASSWORD            = 'password';
    public const PASSWORD_CONFIRMED  = self::PASSWORD . '_confirmation';
    public const AVATAR              = 'avatar_image_url';
    public const FIRST_NAME          = 'first_name';
    public const LAST_NAME           = 'last_name';
    public const FULL_NAME           = 'full_name';
    public const BIO                 = 'bio';
    public const MESSAGE             = 'message';
    public const ACCOUNT_TYPE        = 'account_type';
    public const ACCOUNT_STATUS      = 'account_status';
    public const LIMITATION_END_DATE = 'limitation_end_date';
    public const REMEMBER_TOKEN      = 'remember_token';
    public const CREATED_AT          = 'created_at';
    public const UPDATED_AT          = 'updated_at';
    public const DELETED_AT          = 'deleted_at';
}
