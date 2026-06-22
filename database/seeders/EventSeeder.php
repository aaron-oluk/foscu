<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\RecentEvent;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        RecentEvent::truncate();
        Event::truncate();

        $recentEvents = [
            ['eventname' => 'World Food Safety Day Commemoration: FoSCU leading keynote on chemical food contamination in Gulu City', 'eventdate' => '2023-06-07'],
            ['eventname' => "FoSCU Keynote on chemical food contamination during safe food stakeholders' parliament in Mbale City", 'eventdate' => '2023-07-25'],
            ['eventname' => 'FoSCU members capacity building workshop', 'eventdate' => '2023-08-16'],
            ['eventname' => 'Technical Working Group Strategic plan development', 'eventdate' => '2023-09-30'],
            ['eventname' => 'Production of innovative food safety communication tools', 'eventdate' => '2023-09-30'],
            ['eventname' => 'Finalization of reports on food safety analysis in five value chains', 'eventdate' => '2023-08-31'],
            ['eventname' => 'Development of research and policy briefs on food safety in assessed crop and livestock value chains', 'eventdate' => '2023-09-30'],
            ['eventname' => 'Finalization of food safety-crop-animal evidence synthesis report', 'eventdate' => '2023-09-30'],
            ['eventname' => "FoSCU Communication Materials' review meeting", 'eventdate' => '2023-10-13'],
            ['eventname' => 'Finalisation of FoSCU position paper, research reports and policy briefs on food safety', 'eventdate' => '2023-10-30'],
            ['eventname' => 'Finalization of evidence synthesis report on food safety-crop-animal protection', 'eventdate' => '2023-10-30'],
            ['eventname' => 'Finalisation of Technical Working Group Strategies', 'eventdate' => '2023-10-30'],
            ['eventname' => 'FoSCU 5-year Strategic Plan Development', 'eventdate' => '2023-11-30'],
            ['eventname' => 'Promotion of communication tools on non-chemical pest management', 'eventdate' => '2023-11-30'],
            ['eventname' => 'Review and finalisation of advocacy and communication tools', 'eventdate' => '2023-11-30'],
            ['eventname' => 'Review and finalisation of food safety assessment reports', 'eventdate' => '2023-11-30'],
            ['eventname' => 'FoSCU Steering Committee Meeting', 'eventdate' => '2024-02-02'],
            ['eventname' => 'FoSCU Awareness workshop for farmers (Mityana)', 'eventdate' => '2024-02-05'],
            ['eventname' => 'FoSCU Organisation Capacity Assessment (OCA)', 'eventdate' => '2024-01-30'],
            ['eventname' => 'Awareness Creation meeting with FoSCU members', 'eventdate' => '2024-02-13'],
            ['eventname' => 'FoSCU Annual General Meeting', 'eventdate' => '2024-02-23'],
            ['eventname' => 'Food safety campaign on FoSCU twitter/X page', 'eventdate' => '2024-03-19'],
            ['eventname' => 'Food safety awareness creation at the Harvest Money Expo at Kololo independence ground; Invited by Rikolto and Techno serve', 'eventdate' => '2024-02-25'],
            ['eventname' => 'Awareness creation on food safety at Acer Campion Jesuit College in Gulu targeting the A level students', 'eventdate' => '2024-03-08'],
            ['eventname' => 'Food safety awareness to the media fraternity of Gulu City', 'eventdate' => '2024-03-04'],
            ['eventname' => "Awareness creation meeting with Gulu city markets' committees and inspection of the markets to ascertain potential food safety hazard", 'eventdate' => '2024-03-05'],
            ['eventname' => 'Awareness creation meeting with Gulu City political and technical leadership, CSOs, academic institutions and religious leaders on food safety', 'eventdate' => '2024-03-06'],
            ['eventname' => 'Food safety awareness meeting with Gulu University Guild council and students of Food safety and standards of Gulu University', 'eventdate' => '2024-03-07'],
            ['eventname' => 'Training of market committees of 4 markets in Kasese municipality on Food Safety and consumer protection', 'eventdate' => '2024-03-13'],
            ['eventname' => 'Joint advocacy for aflatoxin Control campaign (JAAC) in Uganda', 'eventdate' => '2024-03-26'],
            ['eventname' => 'Food Safety Awareness meeting with media personalities and Masters of Ceremonies (MCs) of Kasese District and Municipality', 'eventdate' => '2024-03-11'],
            ['eventname' => 'Trained agro ecological trainers of trainers (ToTs) from different Districts of Uganda on food safety; organized by RUCID and AF', 'eventdate' => '2024-03-18'],
            ['eventname' => 'Participated in the launching of the documentary on unmasking food safety hazards', 'eventdate' => '2024-03-21'],
            ['eventname' => 'Launching of the Food Safety partnership initiative with Buganda Kingdom', 'eventdate' => '2024-03-22'],
            ['eventname' => 'Breakfast meeting on consumer protection in the face of Artificial intelligence', 'eventdate' => '2024-03-28'],
            ['eventname' => 'FoSCU members planning meeting', 'eventdate' => '2024-04-19'],
            ['eventname' => "Presenting FoSCU's food safety policy recommendations in relevant national fora", 'eventdate' => '2024-04-30'],
            ['eventname' => 'Publication of tailored food safety reports, policy briefs and position paper on FoSCU platforms', 'eventdate' => '2024-04-30'],
            ['eventname' => 'Research briefs', 'eventdate' => '2024-05-31'],
            ['eventname' => 'Policy briefs', 'eventdate' => '2024-05-31'],
            ['eventname' => 'Synthesis report', 'eventdate' => '2024-05-31'],
            ['eventname' => 'Lessons learnt workshop', 'eventdate' => '2024-05-31'],
            ['eventname' => 'Endline survey', 'eventdate' => '2024-05-31'],
        ];

        foreach ($recentEvents as $event) {
            RecentEvent::create($event);
        }
    }
}
