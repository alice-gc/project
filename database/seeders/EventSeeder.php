<?php

namespace Database\Seeders;

use App\Models\Event;
use Faker\Generator;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event_template = [

            'user_id' => '1',
            'eventTitle' => 'EventTemplate',
            'presetCategory' => '1',
            'color' => '#1638f7',
            'description' => 'This is a template of the event',
            'eventStartTime' => '12:00',
            'eventEndTime' => '15:00'

        ];

        Event::create($event_template);
    }
}
