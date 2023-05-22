<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\User\DTO\UserDTO;
use Modules\User\Enums\AccountStatus;
use Modules\User\Enums\AccountType;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string(UserDTO::EMAIL)->unique();
            $table->string(UserDTO::PASSWORD)->nullable();
            $table->string(UserDTO::AVATAR_IMAGE_URL)->nullable();
            $table->string(UserDTO::FIRST_NAME)->nullable();
            $table->string(UserDTO::LAST_NAME)->nullable();
            $table->string(UserDTO::FULL_NAME)->virtualAs("concat(" . UserDTO::FIRST_NAME . ", ' ', " . UserDTO::LAST_NAME . ")");
            $table->tinyText(UserDTO::BIO)->nullable();
            $table->tinyText(UserDTO::MESSAGE)->nullable();
            $table->tinyInteger(UserDTO::ACCOUNT_TYPE);
            $table->tinyInteger(UserDTO::ACCOUNT_STATUS);
            $table->timestamp(UserDTO::LIMITATION_END_DATE)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
