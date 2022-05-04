<?php

namespace Database\Seeders;

use App\Models\Budget;
use Faker\Generator;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $budget_template = [

            'name' => 'Template',
            'house' => 10,
            'food' => 10,
            'transport' => 10,
            'personal' => 10,
            'entertainment' => 10,
            'user_id' => 1

        ];

        Budget::create($budget_template);

    }
}
