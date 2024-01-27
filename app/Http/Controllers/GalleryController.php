<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Storage::files('public/avatars');
        $pageTitle = "Gallery";

        // Remove 'public/' from the URL using the asset function
        $imageUrls = array_map(function ($image) {
            return asset('storage/' . Str::replaceFirst('public/', '', $image));
        }, $images);

        return view('pages.gallery', compact('imageUrls', 'pageTitle'));
    }
    public function delete($image)
    {
        Storage::delete('public/avatars/' . $image);

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully.');
    }
    public function deleteMultiple(Request $request)
    {
        $imagesToDelete = $request->input('images');

        foreach ($imagesToDelete as $image) {
            // Delete each image from storage
            Storage::delete('public/' . $image);
        }

        return response()->json(['message' => 'Images deleted successfully']);
    }
}