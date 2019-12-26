<?php

use Carbon\Traits\Timestamp;
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
        'name'  => 'Admininistrador',
        'email'     => 'admin@gmail.com',
        'password'  => bcrypt('12345678'),
             
        ]);
    }
}
