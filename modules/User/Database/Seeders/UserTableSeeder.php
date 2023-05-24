<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;
use Modules\User\MCF\UserMCF;

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
                UserMCF::FIRST_NAME     => 'BlogX',
                UserMCF::LAST_NAME      => 'System',
                UserMCF::EMAIL          => 'system@blogx.ir',
                UserMCF::USERNAME       => 'blogx',
                UserMCF::PASSWORD       => bcrypt('123456789'),
                UserMCF::ACCOUNT_TYPE   => AccountType::System,
                UserMCF::ACCOUNT_STATUS => AccountStatus::Free,
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
                UserMCF::FIRST_NAME     => 'BlogX',
                UserMCF::LAST_NAME      => 'Admin',
                UserMCF::EMAIL          => 'admin@blogx.ir',
                UserMCF::USERNAME       => 'owner',
                UserMCF::PASSWORD       => bcrypt('123456789'),
                UserMCF::ACCOUNT_TYPE   => AccountType::Admin,
                UserMCF::ACCOUNT_STATUS => AccountStatus::Free,
            ],
        );

        return $this;
    }
}
