<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventPhotosApiController extends Controller
{
    public function getCategoryPhotos($slug)
    {
        try {
            $category = EventCategory::where('slug', $slug)
                ->where('status', 'active')
                ->with(['activePhotos' => function($query) {
                    $query->orderBy('display_order');
                }])
                ->first();

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            $photos = $category->activePhotos->map(function($photo) {
                return [
                    'id' => $photo->id,
                    'title' => $photo->title,
                    'description' => $photo->description,
                    'image_url' => $photo->image_url,
                    'alt_text' => $photo->alt_text,
                ];
            });

            return response()->json([
                'success' => true,
                'category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'slug' => $category->slug,
                ],
                'photos' => $photos
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading photos'
            ], 500);
        }
    }
}
