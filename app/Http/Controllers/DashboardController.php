<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RecentEvent;
use App\Models\Logo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $upcomingEvents = Event::where('status', 'upcoming')->count();
        $totalRecentEvents = RecentEvent::count();
        $totalLogos = Logo::count();
        
        $recentEvents = Event::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('dashboard', compact(
            'totalEvents',
            'upcomingEvents', 
            'totalRecentEvents',
            'totalLogos',
            'recentEvents'
        ));
    }
}
