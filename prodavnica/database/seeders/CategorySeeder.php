<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Category 1',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Category 2',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Category 3',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
