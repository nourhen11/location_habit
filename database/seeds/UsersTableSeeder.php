<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'phone' => '23569412',
            'photo' => null,
            'role_id' => '1'
            
            ]);
            User::create([
                'first_name' => 'user1',
                'last_name' => 'user1',
                'email' => 'user1@mail.com',
                'password' => bcrypt('user1'),
                'phone' => '23569912',
                'photo' => null,
                'role_id' => '2'
                
                ]);
        
    }
}
