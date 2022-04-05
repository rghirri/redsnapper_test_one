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
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Jasminder',
            'email'=> 'jasminder@jasminder.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Jo',
            'email'=> 'jo@jo.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Alex',
            'email'=> 'alex@alex.com',
            'password'  => Hash::make('password')
        ]);
        User::create([
            'name' => 'Ash',
            'email'=> 'ash@ash.com',
            'password'  => Hash::make('password')
        ]);
         User::create([
            'name' => 'Brooke',
            'email'=> 'brooke@brooke.com',
            'password'  => Hash::make('password')
        ]);
    }
}