<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class ExerciseController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $exercises = Exercise::all();
        return view('admin.exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('admin.exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url|max:255', // Changed to URL validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'exercises');

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'video_url' => $request->video_url, // Store video URL instead of file path
            'image' => $imagePath,
        ]);

        return redirect()->route('exercises.index')->with('success', 'Exercise added successfully.');
    }

    public function edit(Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url|max:255', // Changed to URL validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'exercises', $exercise->image);

        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'video_url' => $request->video_url, // Update video URL instead of file
            'image' => $imagePath,
        ]);

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    public function destroy(Exercise $exercise)
    {
        $this->deleteFile($exercise->image); // Only delete image, no video file to delete
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}