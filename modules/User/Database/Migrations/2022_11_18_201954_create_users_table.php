<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\User\MCF\UserMCF;

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
            $table->string(UserMCF::EMAIL)->unique();
            $table->string(UserMCF::PASSWORD)->nullable();
            $table->string(UserMCF::AVATAR_IMAGE_URL)->nullable();
            $table->string(UserMCF::FIRST_NAME)->nullable();
            $table->string(UserMCF::LAST_NAME)->nullable();
            $table->string(UserMCF::FULL_NAME)->virtualAs("concat(" . UserMCF::FIRST_NAME . ", ' ', " . UserMCF::LAST_NAME . ")");
            $table->tinyText(UserMCF::BIO)->nullable();
            $table->tinyText(UserMCF::MESSAGE)->nullable();
            $table->tinyInteger(UserMCF::ACCOUNT_TYPE);
            $table->tinyInteger(UserMCF::ACCOUNT_STATUS);
            $table->timestamp(UserMCF::LIMITATION_END_DATE)->nullable();
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
