<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RecentEvent;
use App\Models\Logo;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::orderBy('eventdate', 'desc')->get();
        $recentEvents = RecentEvent::orderBy('eventdate', 'desc')->limit(4)->get();
        $logos = Logo::all();
        $eventCategories = EventCategory::active()->with('activePhotos')->ordered()->get();

        return view('home', compact('upcomingEvents', 'recentEvents', 'logos', 'eventCategories'));
    }

    public function focus()
    {
        return view('pages.focus');
    }

    public function whoWeAre()
    {
        return view('pages.who-we-are');
    }

    public function ourWork()
    {
        return view('pages.our-work');
    }

    public function informationResources()
    {
        return view('pages.information-resources');
    }

    public function approach()
    {
        return view('pages.approach');
    }

    public function mission()
    {
        return view('pages.mission');
    }

    public function agm()
    {
        return view('pages.agm');
    }

    public function papers()
    {
        $pdfs = [
            ['file' => 'FOSCU Sythesis Report 2024-FINAL.pdf', 'title' => 'FoSCU Synthesis Report 2024'],
            ['file' => 'FoSCU Report_Members OCA.pdf', 'title' => 'FoSCU Report Members OCA'],
            ['file' => 'FoSCU Research Brief 01_MaizeVC.pdf', 'title' => 'Research Brief - Maize Value Chain'],
            ['file' => 'FoSCU Research Brief 02_GnutsVC.pdf', 'title' => 'Research Brief - Groundnuts Value Chain'],
            ['file' => 'FoSCU Research brief 03_DairyVC.pdf', 'title' => 'Research Brief - Dairy Value Chain'],
            ['file' => 'FoSCU Research brief 04_BeefVC.pdf', 'title' => 'Research Brief - Beef Value Chain'],
            ['file' => 'FoSCU Research brief 05_FruitsandVegiezVC.pdf', 'title' => 'Research Brief - Fruits and Vegetables Value Chain'],
        ];

        return view('pages.papers', compact('pdfs'));
    }

    public function posters()
    {
        return view('pages.posters');
    }

    public function reports()
    {
        // Get reports from storage
        $reports = collect([
            [
                'title' => 'FOSCU Synthesis Report 2024',
                'description' => 'Comprehensive synthesis of food safety activities and outcomes for 2024',
                'file' => 'FOSCU Sythesis Report 2024-FINAL.pdf',
                'category' => 'reports'
            ],
            [
                'title' => 'FoSCU Members OCA Report',
                'description' => 'Organizational capacity assessment of FoSCU members and stakeholders',
                'file' => 'FoSCU Report_Members OCA.pdf',
                'category' => 'reports'
            ]
        ]);
        
        return view('pages.reports', compact('reports'));
    }

    public function research()
    {
        // Get research briefs from storage
        $researchBriefs = collect([
            [
                'title' => 'FoSCU Research Brief 01 - Maize Value Chain',
                'description' => 'Food safety challenges and opportunities in the maize value chain',
                'file' => 'FoSCU Research Brief 01_MaizeVC.pdf',
                'category' => 'research'
            ],
            [
                'title' => 'FoSCU Research Brief 02 - Groundnuts Value Chain', 
                'description' => 'Food safety assessment in groundnut production and processing',
                'file' => 'FoSCU Research Brief 02_GnutsVC.pdf',
                'category' => 'research'
            ],
            [
                'title' => 'FoSCU Research Brief 03 - Dairy Value Chain',
                'description' => 'Food safety practices in dairy production and distribution',
                'file' => 'FoSCU Research brief 03_DairyVC.pdf',
                'category' => 'research'
            ],
            [
                'title' => 'FoSCU Research Brief 04 - Beef Value Chain',
                'description' => 'Food safety standards in beef production and processing',
                'file' => 'FoSCU Research brief 04_BeefVC.pdf',
                'category' => 'research'
            ],
            [
                'title' => 'FoSCU Research Brief 05 - Fruits and Vegetables Value Chain',
                'description' => 'Food safety considerations in fruits and vegetables value chain',
                'file' => 'FoSCU Research brief 05_FruitsandVegiezVC.pdf',
                'category' => 'research'
            ],
            [
                'title' => 'Aflatoxins in Uganda Report',
                'description' => 'Comprehensive study on aflatoxin contamination in Uganda food systems',
                'file' => 'AFLATOXINS IN UGANDA 03062025. Final Printable version pdf.pdf',
                'category' => 'research'
            ]
        ]);
        
        return view('pages.research', compact('researchBriefs'));
    }

    public function audio()
    {
        return view('pages.audio');
    }

    public function infovid()
    {
        return view('pages.infovid');
    }

    public function conv()
    {
        return view('pages.conv');
    }

    public function videos()
    {
        $videos = [
            'ckqaq-Bd1Yo',
            'DWUmASq_9V0',
            'QQ7G1vUicYc',
            'RMH5hFnoAss',
            'gNHJWofjhss',
            'qpcW8aVOPpc',
            'i83tgttUB2c',
            '3OCuWPzgsTU',
            '8ATGgP5VDzc'
        ];
        
        return view('pages.videos', compact('videos'));
    }

    public function articles()
    {
        $articles = [
            ['file' => '1HAZARDOUS PESTICIDES CRISIS.pdf', 'title' => 'Hazardous Pesticides Crisis'],
            ['file' => '2Crisis of HHP.pdf', 'title' => 'Crisis of HHP'],
            ['file' => '3FoSCU Participation in the CAADP.pdf', 'title' => 'FOSCU Participation in the CAADP'],
            ['file' => 'no 4 50 YEARS OF FOOD SAFETY EXCELLENCE.pdf', 'title' => '50 Years of Food Safety Excellence'],
            ['file' => 'no 5 RUCID CHAMPIONS ORGANIC AGRICULTURE TRAINING IN UGANDA.pdf', 'title' => 'RUCID Champions Organic Agriculture Training in Uganda'],
            ['file' => 'no 6 The Magic of Pheromone Sex Traps.pdf', 'title' => 'The Magic of Pheromone Sex Traps'],
            ['file' => 'no 7 COLLABORATIVE DEVELOPMENT OF FOOD SAFETY GUIDANCE.pdf', 'title' => 'Collaborative Development of Food Safety Guidance'],
            ['file' => 'no 8 AGROECOLOGY.pdf', 'title' => 'AGROECOLOGY'],
            ['file' => 'no 9 FROM TOMATO STALLS TO POLICY HALLS.pdf', 'title' => 'FROM TOMATO STALLS TO POLICY HALLS'],
            ['file' => 'no 10 THE PEOPLE\'S TRIBUNAL ON AGROTOXINS.pdf', 'title' => 'THE PEOPLE\'S TRIBUNAL ON AGROTOXINS'],
            ['file' => 'no 11 CONSENT Enhancing Food Safety Initiatives at Mbale Central.pdf', 'title' => 'Enhancing Food Safety Initiatives at Mbale Central'],
            ['file' => 'no 12 FOSCU AT HARVEST MONEY EXPO 2025.pdf', 'title' => 'FOSCU AT HARVEST MONEY EXPO 2025'],
            ['file' => 'no 13 FOSCU ADVOCATES FOR ROBUST FOOD SAFETY MEASURES IN UGANDA\'S REVISED NUTRITION POLICY AND BILL.pdf', 'title' => 'FOSCU ADVOCATES FOR ROBUST FOOD SAFETY MEASURES IN UGANDA\'S REVISED NUTRITION POLICY AND BILL'],
            ['file' => 'no 14 FOSCU TAKES TO THE AIRWAVES AMPLIFYING FOOD SAFETY AWARENESS AND ADVOCACY IN UGANDA.pdf', 'title' => 'FOSCU TAKES TO THE AIRWAVES AMPLIFYING FOOD SAFETY AWARENESS AND ADVOCACY IN UGANDA'],
            ['file' => 'no 15 FOSCU SPEAR HEADS AFLATOXIN AWARENESS CAMPAIGN TO SAFEGUARD UGANDA\'S FOOD VALUE CHAIN.pdf', 'title' => 'FOSCU SPEAR HEADS AFLATOXIN AWARENESS CAMPAIGN TO SAFEGUARD UGANDA\'S FOOD VALUE CHAIN'],
            ['file' => 'no 16 TACKLING FOOD SAFETY AND MALNUTRITION.pdf', 'title' => 'TACKLING FOOD SAFETY AND MALNUTRITION'],
            ['file' => 'no 17 ADDRESSING THE RISKS OF HIGHLY HAZARDOUS PESTICIDES IN UGANDA.pdf', 'title' => 'ADDRESSING THE RISKS OF HIGHLY HAZARDOUS PESTICIDES IN UGANDA'],
            ['file' => 'no 18 GROUNDNUT TRADERS DEVELOP SELF REGULATION FRAMEWORK.pdf', 'title' => 'GROUNDNUT TRADERS DEVELOP SELF REGULATION FRAMEWORK']
        ];
        
        return view('pages.articles', compact('articles'));
    }

    public function policyBriefs()
    {
        return view('pages.policy-briefs');
    }

    public function eLearning()
    {
        return view('pages.e-learning');
    }

    public function relevantSites()
    {
        $sites = [
            ['name' => 'Food and Agriculture Organization (FAO)', 'url' => 'https://www.fao.org/', 'description' => 'Leading the effort to defeat hunger and improve nutrition and food security'],
            ['name' => 'World Health Organization (WHO)', 'url' => 'https://www.who.int/health-topics/food-safety', 'description' => 'Food safety information and resources'],
            ['name' => 'Codex Alimentarius', 'url' => 'https://www.fao.org/fao-who-codexalimentarius/en/', 'description' => 'International food standards, guidelines and codes of practice'],
            ['name' => 'Uganda National Bureau of Standards', 'url' => 'https://unbs.go.ug/', 'description' => 'National standards body for Uganda'],
            ['name' => 'Ministry of Agriculture, Animal Industry and Fisheries', 'url' => 'https://www.agriculture.go.ug/', 'description' => 'Government ministry responsible for agriculture in Uganda']
        ];
        
        return view('pages.relevant-sites', compact('sites'));
    }
}
