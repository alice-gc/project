<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_template = [
            'categoryName' => 'Template',
            'categoryColor' => '#42c2f5',
            'categoryStartTime' => '12:00',
            'categoryEndTime' => '14:30',
            'categoryDay' => '1',
            'user_id' => 1
        ];

        Category::create($category_template);
    }
}
