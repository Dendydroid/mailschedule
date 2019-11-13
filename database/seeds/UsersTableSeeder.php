<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $randomTimezoneOffset = random_int(-2,2);
        DB::table('users')->insert([
            'name' => Str::random(12),
            'email' => Str::random(12).'@gmail.com',
            'password' => bcrypt('secret'),
            'timezone' => $randomTimezoneOffset
        ]);
    }
}
