<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        factory(User::class)->create([
            'name' => 'Amitav Roy',
            'email' => 'amitav.roy@focalworks.in',
            'password' => bcrypt('password'),
            'active' => 1,
        ]);
    }
}
