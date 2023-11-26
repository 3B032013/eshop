<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        //總共有 (5種*每種5個)商品
        $names = ['商品1', '商品2', '商品3', '商品4', '商品5' , '商品6', '商品7', '商品8', '商品9', '商品10'
            , '商品11', '商品12', '商品13', '商品14', '商品15', '商品16', '商品17', '商品18', '商品19', '商品20'
            , '商品21', '商品22', '商品23', '商品24', '商品25']; // 指定的商品名稱

        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
