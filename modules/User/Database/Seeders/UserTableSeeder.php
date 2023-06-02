<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\Fields\UserFields;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        $this
            ->system()
            ->sudo();
    }

    /**
     * Create System User
     *
     * @return self
     */
    private function system(): self
    {
        user()->create(
            [
                UserFields::FIRST_NAME     => 'BlogX',
                UserFields::LAST_NAME      => 'System',
                UserFields::EMAIL          => 'system@blogx.ir',
                UserFields::USERNAME       => 'blogx',
                UserFields::PASSWORD       => bcrypt('123456789'),
                UserFields::ACCOUNT_TYPE   => AccountType::System,
                UserFields::ACCOUNT_STATUS => AccountStatus::Free,
            ],
        );

        return $this;
    }

    /**
     * Create Sudo User
     *
     * @return self
     */
    private function sudo(): self
    {
        user()->create(
            [
                UserFields::FIRST_NAME     => 'BlogX',
                UserFields::LAST_NAME      => 'Admin',
                UserFields::EMAIL          => 'admin@blogx.ir',
                UserFields::USERNAME       => 'owner',
                UserFields::PASSWORD       => bcrypt('123456789'),
                UserFields::ACCOUNT_TYPE   => AccountType::Admin,
                UserFields::ACCOUNT_STATUS => AccountStatus::Free,
            ],
        );

        return $this;
    }
}
