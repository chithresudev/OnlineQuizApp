<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Admin Credencial
          DB::table('users')->insert([
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'phone' => '1234567890',
              'password' => bcrypt('admin@123'),
              'type' => 'admin',
          ]);
    }
}
