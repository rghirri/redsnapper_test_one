<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'Dentists'
        ]);
        Team::create([
            'name' => 'Reception'
        ]);
        Team::create([
            'name' => 'Nurses'
        ]);
        Team::create([
            'name' => 'Hygienist'
        ]);
        Team::create([
            'name' => 'Patients'
        ]);
    }
}