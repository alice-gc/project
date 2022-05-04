<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_template = [
            'name' => 'bob',
            'email' => 'bob@bob.com',
            'password' => Hash::make('password'),
            'last_login_at' => Null
        ];

        User::create($user_template);
    }
}
