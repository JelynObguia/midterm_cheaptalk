<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = ['Showbiz','Business', 'Comedy', 'Drama', 'Horror', 'LifeStyle', 'Sports', 'Romance'];
        return [
            'category'  => $this->faker->unique()->randomElement($categories),
            'remarks'   => $this->faker->sentence()
        ];
    }
}
