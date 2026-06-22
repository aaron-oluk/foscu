<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\RecentEvent;
use App\Models\Logo;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create upcoming events
        Event::create([
            'eventname' => 'FoSCU Annual Conference 2025',
            'eventdate' => Carbon::now()->addMonths(2),
            'enddate' => Carbon::now()->addMonths(2)->addDays(2),
        ]);

        Event::create([
            'eventname' => 'Food Safety Training Workshop',
            'eventdate' => Carbon::now()->addMonths(1),
            'enddate' => Carbon::now()->addMonths(1)->addDays(1),
        ]);

        // Create recent events
        RecentEvent::create([
            'eventname' => 'World Food Safety Day Commemoration: FoSCU leading keynote on chemical food contamination in Gulu City',
            'eventdate' => Carbon::parse('2023-06-07'),
        ]);

        RecentEvent::create([
            'eventname' => 'FoSCU Keynote on chemical food contamination during safe food stakeholders\' parliament in Mbale City',
            'eventdate' => Carbon::parse('2023-07-25'),
        ]);

        RecentEvent::create([
            'eventname' => 'FoSCU members capacity building workshop',
            'eventdate' => Carbon::parse('2023-08-16'),
        ]);

        RecentEvent::create([
            'eventname' => 'Technical Working Group Strategic plan development',
            'eventdate' => Carbon::parse('2023-09-30'),
        ]);

        // Create sample logos
        Logo::create([
            'organisation' => 'FoSCU',
            'picture' => null,
            'upload_date' => Carbon::now(),
        ]);

        Logo::create([
            'organisation' => 'Ministry of Agriculture',
            'picture' => null,
            'upload_date' => Carbon::now(),
        ]);

        Logo::create([
            'organisation' => 'Uganda National Bureau of Standards',
            'picture' => null,
            'upload_date' => Carbon::now(),
        ]);
    }
}
