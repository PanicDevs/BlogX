<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\User\Fields\UserFields;

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
            $table->string(UserFields::EMAIL)->unique();
            $table->string(UserFields::USERNAME)->unique();
            $table->string(UserFields::PASSWORD)->nullable();
            $table->string(UserFields::FIRST_NAME)->nullable();
            $table->string(UserFields::LAST_NAME)->nullable();
            $table->string(UserFields::FULL_NAME)->virtualAs("concat(" . UserFields::FIRST_NAME . ", ' ', " . UserFields::LAST_NAME . ")");
            $table->tinyText(UserFields::BIO)->nullable();
            $table->tinyText(UserFields::MESSAGE)->nullable();
            $table->tinyInteger(UserFields::ACCOUNT_TYPE);
            $table->tinyInteger(UserFields::ACCOUNT_STATUS);
            $table->timestamp(UserFields::LIMITATION_END_DATE)->nullable();
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
