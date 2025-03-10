<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    // Display all exercises
    public function index()
    {
        $exercises = Exercise::all(); // Fetch all exercises from the database
        return view('admin.exercises.index', compact('exercises')); // Pass exercises to the view
    }

    // Display the form to add a new exercise
    public function create()
    {
        return view('admin.exercises.create'); // Return the create exercise view
    }

    // Store the new exercise in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'description' => 'nullable|string', // Description is optional
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:50000', // Video must be a valid video file (max 50MB)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
        ]);

        // Upload the video if provided
        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public'); // Save the video in storage/app/public/videos
        }

        // Upload the image if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('exercises', 'public'); // Save the image in storage/app/public/exercises
        }

        // Create the exercise in the database
        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'video' => $videoPath,
            'image' => $imagePath,
        ]);

        // Redirect to the exercises list with a success message
        return redirect()->route('exercises.index')->with('success', 'Exercise added successfully.');
    }

    // Display the form to edit an exercise
    public function edit(Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('exercise')); // Pass the exercise to the edit view
    }

    // Update the exercise's details in the database
    public function update(Request $request, Exercise $exercise)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'description' => 'nullable|string', // Description is optional
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:50000', // Video must be a valid video file (max 50MB)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
        ]);

        // Update the video if a new one is uploaded
        $videoPath = $exercise->video;
        if ($request->hasFile('video')) {
            // Delete the old video if it exists
            if ($videoPath && Storage::disk('public')->exists($videoPath)) {
                Storage::disk('public')->delete($videoPath);
            }
            // Save the new video
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        // Update the image if a new one is uploaded
        $imagePath = $exercise->image;
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Save the new image
            $imagePath = $request->file('image')->store('exercises', 'public');
        }

        // Update the exercise in the database
        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'video' => $videoPath,
            'image' => $imagePath,
        ]);

        // Redirect to the exercises list with a success message
        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    // Delete an exercise
    public function destroy(Exercise $exercise)
    {
        // Delete the video if it exists
        if ($exercise->video && Storage::disk('public')->exists($exercise->video)) {
            Storage::disk('public')->delete($exercise->video);
        }

        // Delete the image if it exists
        if ($exercise->image && Storage::disk('public')->exists($exercise->image)) {
            Storage::disk('public')->delete($exercise->image);
        }

        // Delete the exercise from the database
        $exercise->delete();

        // Redirect to the exercises list with a success message
        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}