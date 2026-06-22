<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\RecentEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('eventdate', 'desc')->get();
        $recentEvents = RecentEvent::orderBy('eventdate', 'desc')->get();
        
        return view('admin.events.index', compact('events', 'recentEvents'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'eventname' => 'required|string|max:250',
            'description' => 'nullable|string',
            'eventdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:eventdate',
            'event_time' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:upcoming,ongoing,completed',
            'type' => 'required|in:upcoming,recent'
        ]);

        if ($request->type === 'upcoming') {
            $data = $request->except(['image', 'type']);
            
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('events', 'public');
            }
            
            Event::create($data);
        } else {
            RecentEvent::create([
                'eventname' => $request->eventname,
                'eventdate' => $request->eventdate,
            ]);
        }

        return redirect()->route('admin.events.index')
            ->with('message', 'Event created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'eventname' => 'required|string|max:250',
            'description' => 'nullable|string',
            'eventdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:eventdate',
            'event_time' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|in:upcoming,ongoing,completed',
        ]);

        $event = Event::findOrFail($id);
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('message', 'Event updated successfully');
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('message', 'Event deleted successfully');
    }

    public function destroyRecent(string $id)
    {
        $event = RecentEvent::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('message', 'Recent event deleted successfully');
    }
}
