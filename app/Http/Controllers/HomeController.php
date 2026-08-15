<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RecentEvent;
use App\Models\Logo;
use App\Models\EventCategory;
use App\Models\ResourceFile;
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
        $pdfs = $this->publicFiles(['papers', 'reports', 'research', 'policy']);

        return view('pages.papers', compact('pdfs'));
    }

    public function posters()
    {
        return view('pages.posters');
    }

    public function reports()
    {
        $reports = $this->publicFiles(['reports', 'papers']);

        return view('pages.reports', compact('reports'));
    }

    public function research()
    {
        $researchBriefs = $this->publicFiles(['research']);

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
        $articles = $this->publicFiles(['articles']);

        return view('pages.articles', compact('articles'));
    }

    public function policyBriefs()
    {
        $briefs = ResourceFile::where('is_public', true)
            ->where('category', 'policy')
            ->orderBy('title')
            ->get();

        return view('pages.policy-briefs', compact('briefs'));
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

    public function updates()
    {
        return view('pages.updates');
    }

    private function publicFiles(array $categories)
    {
        return ResourceFile::where('is_public', true)
            ->whereIn('category', $categories)
            ->orderBy('title')
            ->get()
            ->map(fn (ResourceFile $file) => [
                'title' => $file->display_title,
                'description' => $file->display_filename,
                'file' => basename($file->stored_path),
                'category' => $file->category,
            ]);
    }
}
