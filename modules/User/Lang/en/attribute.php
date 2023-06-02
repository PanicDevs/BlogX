<?php

use Modules\User\Fields\UserFields;
use Modules\User\Schema\UserSchema;

return [
    UserFields::USERNAME => [
        'label'       => 'Username',
        'placeholder' => 'Enter your username',
    ],

    UserFields::EMAIL => [
        'label'       => 'Email',
        'placeholder' => 'Enter your email',
    ],

    UserFields::PASSWORD => [
        'label'       => 'Password',
        'placeholder' => 'Enter an strong password',
    ],

    UserFields::PASSWORD_CONFIRMED => [
        'label'       => 'Password Confirmation',
        'placeholder' => 'Enter your password again',
    ],

    UserFields::AVATAR => [
        'label'       => 'Avatar',
        'placeholder' => 'Select your avatar',
    ],

    UserFields::FIRST_NAME => [
        'label'       => 'First Name',
        'placeholder' => 'Enter your first name',
    ],

    UserFields::LAST_NAME => [
        'label'       => 'Last Name',
        'placeholder' => 'Enter your last name',
    ],

    UserFields::FULL_NAME => [
        'label'       => 'Full Name',
        'placeholder' => 'Enter your full name',
    ],

    UserFields::BIO => [
        'label'       => 'Bio',
        'placeholder' => 'Enter a short bio about yourself',
    ],

    UserFields::MESSAGE => [
        'label'       => 'Message',
        'placeholder' => 'Enter your message',
    ],

    UserFields::ACCOUNT_TYPE => [
        'label'       => 'Account Type',
        'placeholder' => 'Select your account type',
    ],

    UserFields::ACCOUNT_STATUS => [
        'label'       => 'Account Status',
        'placeholder' => 'Select your account status',
    ],

    UserFields::LIMITATION_END_DATE => [
        'label'       => 'Limitation End Date',
        'placeholder' => 'Select the end date of the limitation',
    ],

    UserFields::REMEMBER_TOKEN => [
        'label'       => 'Remember Token',
        'placeholder' => 'Your remember token',
    ],

    UserFields::CREATED_AT => [
        'label'       => 'Created At',
        'placeholder' => 'Select the creation date',
    ],

    UserFields::UPDATED_AT => [
        'label'       => 'Last Modified At',
        'placeholder' => 'Select the update date',
    ],

    UserFields::DELETED_AT => [
        'label'       => 'Deleted At',
        'placeholder' => 'Select the deletion date',
    ],

    UserSchema::PERSONAL_INFO => [
        'label'       => 'Personal Info',
        'description' => 'Select the deletion date',
    ],

    UserSchema::ACCOUNT_INFO => [
        'label'       => 'Account Info',
        'description' => 'Select the deletion date',
    ],

    UserSchema::ACCOUNT_TYPE => [
        'label'       => 'Account Type',
        'description' => 'Select the deletion date',
    ],
];
