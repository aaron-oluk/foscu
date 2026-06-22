<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventCategory;

class EventCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Food Safety Workshops',
                'description' => 'Photos from various food safety training workshops and seminars',
                'status' => 'active',
                'display_order' => 1
            ],
            [
                'name' => 'Annual General Meetings',
                'description' => 'Photos from FoSCU Annual General Meetings',
                'status' => 'active',
                'display_order' => 2
            ],
            [
                'name' => 'Community Outreach',
                'description' => 'Photos from community outreach programs and awareness campaigns',
                'status' => 'active',
                'display_order' => 3
            ],
            [
                'name' => 'Research Activities',
                'description' => 'Photos from research activities and field work',
                'status' => 'active',
                'display_order' => 4
            ],
            [
                'name' => 'Training Sessions',
                'description' => 'Photos from various training sessions and capacity building activities',
                'status' => 'active',
                'display_order' => 5
            ]
        ];

        foreach ($categories as $category) {
            EventCategory::create($category);
        }
    }
}
