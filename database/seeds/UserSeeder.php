<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin',
            'role'      => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Jasminder',
            'role'      => 'write',
            'email'=> 'jasminder@jasminder.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Jo',
            'role' => 'writer',
            'email'=> 'jo@jo.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Alex',
            'role' => 'writer',
            'email'=> 'alex@alex.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Ash',
            'role' => 'writer',
            'email'=> 'ash@ash.com',
            'password'  => Hash::make('password')
        ]);
         User::create([
            'name' => 'Brooke',
            'role' => 'writer',
            'email'=> 'brooke@brooke.com',
            'password'  => Hash::make('password')
        ]);
    }
}