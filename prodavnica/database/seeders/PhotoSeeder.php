<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
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
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => Product::all()->random()->id,
                'image' => 'imagee2.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => Product::all()->random()->id,
                'image' => 'imagee3.jpg',
                'created_at' => Carbon::now(),
            ],
            [
                'product_id' => Product::all()->random()->id,
                'image' => 'imagee3.jpg',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
