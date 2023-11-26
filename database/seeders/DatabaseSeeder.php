<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 新增 5 種商品類別，每一類別有 5 種商品
        $categories = Category::factory(5)->create()->each(function ($category) {
            $products = Product::factory(5)->create(['category_id' => $category->id]);
        });

        // 新增 3 位使用者，每位使用者有 3 張訂單，每筆訂單有 3 個不同商品
        // 3 位使用者
        User::factory(3)->create()->each(function ($user) use ($categories) {
            $orders = Order::factory(3)->create(['user_id' => $user->id]);

            // 9 張訂單
            foreach ($orders as $order) {
                // 隨機從各類別取得商品
                $products = Product::whereIn('category_id', $categories->pluck('id')->all())
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
                // 27 筆訂單商品
                foreach ($products as $product) {
                    OrderItem::factory()->create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                    ]);
                }
            }

            // 每位使用者有 3 個選購商品
            $cartItems = Product::whereIn('category_id', $categories->pluck('id')->all())
                ->inRandomOrder()
                ->limit(3)
                ->get();
            // 9 個選購商品
            foreach ($cartItems as $cartItem) {
                CartItem::factory()->create([
                    'user_id' => $user->id,
                    'product_id' => $cartItem->id,
                ]);
            }
        });
    }
}
