<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RecentEvent;
use App\Models\Logo;
use App\Models\ResourceFile;
use App\Models\SystemBackup;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $upcomingEvents = Event::where('status', 'upcoming')->count();
        $totalRecentEvents = RecentEvent::count();
        $totalLogos = Logo::count();
        $totalFiles = ResourceFile::count();
        $totalBackups = SystemBackup::where('status', 'completed')->count();
        $totalUsers = User::count();
        
        $recentEvents = Event::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('dashboard', compact(
            'totalEvents',
            'upcomingEvents', 
            'totalRecentEvents',
            'totalLogos',
            'totalFiles',
            'totalBackups',
            'totalUsers',
            'recentEvents'
        ));
    }
}
