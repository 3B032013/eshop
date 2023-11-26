<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
    protected $model = Category::class;
    public function definition(): array
    {
        $categories = ['3C', '家電', '服飾', '食品', '書籍']; // 指定的商品類型

        return [
            'name' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
