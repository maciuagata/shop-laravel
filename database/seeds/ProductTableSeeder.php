<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1515555230216-82228b88ea98?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=926&q=80',
            'title' => 'Nike Air shoes',
            'description' => '41 size, white',
            'price' => 60
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1511746315387-c4a76990fdce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            'title' => 'Adidas Top',
            'description' => 'Color: red, 40 size',
            'price' => 30
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=926&q=80',
            'title' => 'Jeans',
            'description' => 'Skinny three assorted-color denim bottoms, 40 size',
            'price' => 20
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1545552352-6eb1ab0862a4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80',
            'title' => 'Sweater',
            'description' => 'Womens brown sweat shirt, 40 size',
            'price' => 25
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1557445062-41dc80df5cb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80',
            'title' => 'Cardigan',
            'description' => 'Brown cardigan, 40 size',
            'price' => 15
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images.unsplash.com/photo-1571063965755-57673e818410?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80',
            'title' => 'Sweater',
            'description' => 'Gray sweater, 40 size',
            'price' => 24
        ]);
        $product->save();
    }
}
