<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('users')->insert([
        'name' => 'Mukesh Tivari',
        'email' => 'er.mts1993@gmail.com',
        'password' => bcrypt('password'),
        'role' => 'admin'
    ]);
    DB::table('users')->insert([
        'name' => 'Bhautik Jani',
        'email' => 'bhautikjani@gmail.com',
        'password' => bcrypt('password'),
        'role' => 'user'
    ]);
  }

}
