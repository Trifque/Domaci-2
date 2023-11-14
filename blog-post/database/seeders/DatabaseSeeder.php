<?php

namespace Database\Seeders;

use App\Models\KeyComponent;
use App\Models\Robot;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //KeyComponent::truncate();
        //Robot::truncate();
        //User::truncate();

       Robot::factory(5)->create();
    }
}
