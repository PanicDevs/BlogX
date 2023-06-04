<?php

namespace Modules\Category\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Category\Entities\Category;
use Modules\Category\Enums\CategoryStatus;
use Modules\Category\Fields\CategoryFields;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            CategoryFields::PARENT_ID       => null,
            CategoryFields::NAME            => $this->faker->words(rand(2, 5), true),
            CategoryFields::SLUG            => $this->faker->words(rand(2, 5), true),
            CategoryFields::SUMMARY         => $this->faker->text(rand(30,100)),
            CategoryFields::COVER_IMAGE_URL => null,
            CategoryFields::ICON            => null,
            CategoryFields::STATUS          => CategoryStatus::DISABLE,
        ];
    }
}

