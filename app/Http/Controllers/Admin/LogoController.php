<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::orderBy('display_order')->orderBy('partner_name')->paginate(12);
        return view('admin.logos.index', compact('logos'));
    }

    public function create()
    {
        return view('admin.logos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'website_url' => 'nullable|url|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('logos', 'public');
        }

        Logo::create($data);

        return redirect()->route('admin.logos.index')->with('message', 'Logo added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $logo = Logo::findOrFail($id);
        return view('admin.logos.edit', compact('logo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'website_url' => 'nullable|url|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $logo = Logo::findOrFail($id);
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($logo->image && Storage::disk('public')->exists($logo->image)) {
                Storage::disk('public')->delete($logo->image);
            }
            $data['image'] = $request->file('image')->store('logos', 'public');
        }

        $logo->update($data);

        return redirect()->route('admin.logos.index')->with('message', 'Logo updated successfully');
    }

    public function destroy(string $id)
    {
        $logo = Logo::findOrFail($id);
        
        // Delete image file if exists
        if ($logo->image && Storage::disk('public')->exists($logo->image)) {
            Storage::disk('public')->delete($logo->image);
        }
        
        $logo->delete();

        return redirect()->route('admin.logos.index')->with('message', 'Logo deleted successfully');
    }
}
