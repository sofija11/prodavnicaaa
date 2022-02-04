<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        [
            'name' => 'sofi98',
            'email' => 'sofija98admin@gmail.com',
            'password' => Hash::make('sofi_98'),
            'role_id'  => 1,
        ],
        [
            'name' => 'sofi99',
            'email' => 'sofija99radnik@gmail.com',
            'password' => Hash::make('sofi_99'),
            'role_id'  => 2,
        ]
     ]);
    }
}
