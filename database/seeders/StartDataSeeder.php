<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use App\Models\Timetable;
use App\Models\Hour;
use App\Models\Budget;

class StartDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Auth::id();
        $statusData = [
            [
                'title' => 'Backlog',
                'slug' => 'backlog',
                'order' => 1,
                'user_id' => $id
            ],
            [
                'title' => 'Up Next',
                'slug' => 'up-next',
                'order' => 2,
                'user_id' => $id
            ],
            [
                'title' => 'In Progress',
                'slug' => 'in-progress',
                'order' => 3,
                'user_id' => $id
            ],
            [
                'title' => 'Done',
                'slug' => 'done',
                'order' => 4,
                'user_id' => $id
            ]
        ];
        foreach ($statusData as $status) {
            Status::create($status);
        }
        $id = Auth::id();
        $budget = [

            'name' => 'My Personal Budget',
            'house' => 25,
            'food' => 25,
            'transport' => 25,
            'personal' => 25,
            'entertainment' => 25,
            'user_id' => $id


        ];

        Budget::create($budget);


        $timetableData = [
            [
                'title' => 'Monday',
                'slug' => '1',
                'order' => 1,
                'user_id' => $id
            ],
            [
                'title' => 'Tuesday',
                'slug' => '2',
                'order' => 2,
                'user_id' => $id
            ],
            [
                'title' => 'Wednesday',
                'slug' => '3',
                'order' => 3,
                'user_id' => $id
            ],
            [
                'title' => 'Thursday',
                'slug' => '4',
                'order' => 4,
                'user_id' => $id
            ],
            [
                'title' => 'Friday',
                'slug' => '5',
                'order' => 5,
                'user_id' => $id
            ], [
                'title' => 'Saturday',
                'slug' => '6',
                'order' => 6,
                'user_id' => $id
            ],
            [
                'title' => 'Sunday',
                'slug' => '7',
                'order' => 7,
                'user_id' => $id
            ]
        ];
        foreach ($timetableData as $data) {
            $id_timetable = Timetable::create($data)->id;

            $hours_data = [
                ['hour_number' => 0,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                [
                    'hour_number' => 1,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 2,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 3,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 4,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 5,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 6,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ], [
                    'hour_number' => 7,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 8,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 9,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 10,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ], [
                    'hour_number' => 11,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 12,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 13,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 14,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 15,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 16,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ], [
                    'hour_number' => 17,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 18,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 19,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 20,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ], ['hour_number' => 21,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ],
                ['hour_number' => 22,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ], ['hour_number' => 23,
                    'slot' => 'empty',
                    'user_id' => $id,
                    'timetable_id' => $id_timetable,
                ]

            ];
            foreach ($hours_data as $data) {
                Hour::create($data);
            }

        }
    }
}
