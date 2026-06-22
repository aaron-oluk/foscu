<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use App\Models\EventPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventPhotoController extends Controller
{
    public function index()
    {
        $categories = EventCategory::with('photos')->ordered()->get();
        return view('dashboard.event-photos.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('dashboard.event-photos.create-category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'display_order' => 'required|integer|min:0',
        ]);

        EventCategory::create($request->all());

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event category created successfully.');
    }

    public function editCategory(EventCategory $category)
    {
        return view('dashboard.event-photos.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, EventCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'display_order' => 'required|integer|min:0',
        ]);

        $category->update($request->all());

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event category updated successfully.');
    }

    public function deleteCategory(EventCategory $category)
    {
        $category->delete();

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event category deleted successfully.');
    }

    public function createPhoto($categoryId)
    {
        $category = EventCategory::findOrFail($categoryId);
        return view('dashboard.event-photos.create-photo', compact('category'));
    }

    public function storePhoto(Request $request, $categoryId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'display_order' => 'required|integer|min:0',
        ]);

        $category = EventCategory::findOrFail($categoryId);

        // Store the image
        $imagePath = $request->file('image')->store('event-photos/' . Str::slug($category->name), 'public');

        EventPhoto::create([
            'event_category_id' => $categoryId,
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'alt_text' => $request->alt_text,
            'status' => $request->status,
            'display_order' => $request->display_order,
        ]);

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event photo uploaded successfully.');
    }

    public function editPhoto(EventPhoto $photo)
    {
        return view('dashboard.event-photos.edit-photo', compact('photo'));
    }

    public function updatePhoto(Request $request, EventPhoto $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'display_order' => 'required|integer|min:0',
        ]);

        $data = $request->except('image');

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image
            if (Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }

            // Store new image
            $imagePath = $request->file('image')->store('event-photos/' . Str::slug($photo->category->name), 'public');
            $data['image_path'] = $imagePath;
        }

        $photo->update($data);

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event photo updated successfully.');
    }

    public function deletePhoto(EventPhoto $photo)
    {
        $photo->delete();

        return redirect()->route('dashboard.event-photos.index')
            ->with('success', 'Event photo deleted successfully.');
    }
}
