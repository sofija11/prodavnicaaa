<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    //da je bilo potrebno uneti vise podataka, koristila bih faker svakako
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'code' => '234323ewd',
                'description' => 'description 1',
                'price' => 123,
                'category_id' => Category::all()->random()->id,
            ],
            [
                'name' => 'Product 2',
                'code' => '2dfghfhh23ewd',
                'description' => 'description 2',
                'price' => 1293,
                'category_id' => Category::all()->random()->id,
            ],
            [
                'name' => 'Product 3',
                'code' => '2343794c4fwd',
                'description' => 'description 3',
                'price' => 8783,
                'category_id' => Category::all()->random()->id,
            ],
            [
                'name' => 'Product 4',
                'code' => '234fyf345678ewd',
                'description' => 'description 4',
                'price' => 19977,
                'category_id' => Category::all()->random()->id,
            ],
            [
                'name' => 'Product 5',
                'code' => '23tttu723ewd',
                'description' => 'description 5',
                'price' => 39998,
                'category_id' => Category::all()->random()->id,
            ]
        ]);
    }
}
