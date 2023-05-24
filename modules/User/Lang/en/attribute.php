<?php

use Modules\User\MCF\UserMCF;
use Modules\User\Schema\UserSchema;

return [
    UserMCF::USERNAME => [
        'label'       => 'Username',
        'placeholder' => 'Enter your username',
    ],

    UserMCF::EMAIL => [
        'label'       => 'Email',
        'placeholder' => 'Enter your email',
    ],

    UserMCF::PASSWORD => [
        'label'       => 'Password',
        'placeholder' => 'Enter an strong password',
    ],

    UserMCF::PASSWORD_CONFIRMED => [
        'label'       => 'Password confirmation',
        'placeholder' => 'Enter your password again',
    ],

    UserMCF::AVATAR => [
        'label'       => 'Avatar',
        'placeholder' => 'Select your avatar',
    ],

    UserMCF::FIRST_NAME => [
        'label'       => 'First name',
        'placeholder' => 'Enter your first name',
    ],

    UserMCF::LAST_NAME => [
        'label'       => 'Last name',
        'placeholder' => 'Enter your last name',
    ],

    UserMCF::FULL_NAME => [
        'label'       => 'Full name',
        'placeholder' => 'Enter your full name',
    ],

    UserMCF::BIO => [
        'label'       => 'Bio',
        'placeholder' => 'Enter a short bio about yourself',
    ],

    UserMCF::MESSAGE => [
        'label'       => 'Message',
        'placeholder' => 'Enter your message',
    ],

    UserMCF::ACCOUNT_TYPE => [
        'label'       => 'Account type',
        'placeholder' => 'Select your account type',
    ],

    UserMCF::ACCOUNT_STATUS => [
        'label'       => 'Account status',
        'placeholder' => 'Select your account status',
    ],

    UserMCF::LIMITATION_END_DATE => [
        'label'       => 'Limitation end date',
        'placeholder' => 'Select the end date of the limitation',
    ],

    UserMCF::REMEMBER_TOKEN => [
        'label'       => 'Remember token',
        'placeholder' => 'Your remember token',
    ],

    UserMCF::CREATED_AT => [
        'label'       => 'Created at',
        'placeholder' => 'Select the creation date',
    ],

    UserMCF::UPDATED_AT => [
        'label'       => 'Last modified at',
        'placeholder' => 'Select the update date',
    ],

    UserMCF::DELETED_AT => [
        'label'       => 'Deleted at',
        'placeholder' => 'Select the deletion date',
    ],

    UserSchema::PERSONAL_INFO => [
        'label'       => 'Personal info',
        'description' => 'Select the deletion date',
    ],

    UserSchema::ACCOUNT_INFO => [
        'label'       => 'Account info',
        'description' => 'Select the deletion date',
    ],

    UserSchema::ACCOUNT_TYPE => [
        'label'       => 'Account type',
        'description' => 'Select the deletion date',
    ],
];
