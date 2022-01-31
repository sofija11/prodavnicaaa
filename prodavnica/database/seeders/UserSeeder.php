<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Jane',
                'lastname' => 'Kind',
                'username' => 'jane098',
                'password' =>  md5('jane_987'),
                'role_id' => Role::all()->random()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'firstname' => 'Peter',
                'lastname' => 'Ostin',
                'username' => 'peet_97',
                'password' =>  md5('pet_98'),
                'role_id' => Role::all()->random()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'firstname' => 'Maria',
                'lastname' => 'Stoi',
                'username' => 'mai00_978',
                'password' => md5('stoi_m08'),
                'role_id' => Role::all()->random()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'firstname' => 'Sofia',
                'lastname' => 'Vitorovic',
                'username' => 'sofi98',
                'password' =>  md5('sofi_98'),
                'role_id' => Role::all()->random()->id,
                'created_at' => Carbon::now(),
            ],
            [
                'firstname' => 'Mia',
                'lastname' => 'Spasid',
                'username' => 'mii_98',
                'password' =>  md5('miiiia_078'),
                'role_id' => Role::all()->random()->id,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
