<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Category\Enums\CategoryStatus;
use Modules\Category\Fields\CategoryFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId(CategoryFields::PARENT_ID)->nullable()->constrained('categories');
            $table->string(CategoryFields::NAME);
            $table->string(CategoryFields::SLUG);
            $table->text(CategoryFields::SUMMARY);
            $table->string(CategoryFields::COVER_IMAGE_URL)->nullable();
            $table->string(CategoryFields::ICON)->nullable();
            $table->tinyInteger(CategoryFields::STATUS)->default(CategoryStatus::DISABLE->value);
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
        Schema::dropIfExists('categories');
    }
};
