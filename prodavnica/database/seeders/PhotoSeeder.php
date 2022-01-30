<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'product_id' => Product::all()->random()->id,
                'image' => 'imagee1.jpg',
            ],
            [
                'product_id' => Product::all()->random()->id,
                'image' => 'imagee2.jpg',
            ],
        ]);
    }
}
