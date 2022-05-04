<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserData;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NavbarSeeder::class ,
            UserSeeder::class ,
            CategorySeeder::class ,
            UserDataSeeder::class ,
            EventSeeder::class ,
            SchedulingSeeder::class ,
            BudgetSeeder::class ,
            UserDataSeeder::class

        ]);
    }
}
