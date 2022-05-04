<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserData;
use App\Models\User;
use App\Models\Category;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $category = Category::first();
        $user->categories()->attach($category);


    }
}
