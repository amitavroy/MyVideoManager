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
        
        $user = factory(User::class)->create([
            'name' => 'Amitav Office',
            'email' => 'amitav.roy@focalworks.in',
            'password' => bcrypt('password'),
            'active' => 1,
        ]);

        $this->createComments($user->id, 10);

        $user = factory(User::class)->create([
            'name' => 'Amitav Personal',
            'email' => 'amitavroy@gmail.com',
            'password' => bcrypt('password'),
            'active' => 1,
        ]);

        $this->createComments($user->id, 4);
    }

    private function createComments($userId, $count)
    {
        factory(\App\Comment::class, $count)->create([
            'user_id' => $userId
        ]);
    }
}
