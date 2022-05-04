<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Navbar;
class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'name' => 'Schedule',
                'route' => 'calendar.index',
                'ordering' => 1,
            ],

            [
                'name' => 'Tasks',
                'route' => 'tasks.index',
                'ordering' => 2,
            ],

            [
                'name' => 'Budget',
                'route' => 'budget.index',
                'ordering' => 3,
            ]

        ];
        foreach ($links as $key => $navbar) {
            Navbar::create($navbar);
        }
    }
}