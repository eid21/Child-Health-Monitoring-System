<?php

namespace App\Http\Controllers;

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
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:50000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $videoPath = $this->uploadFile($request, 'video', 'videos');
        $imagePath = $this->uploadFile($request, 'image', 'exercises');

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'video' => $videoPath,
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
            'video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:50000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $videoPath = $this->uploadFile($request, 'video', 'videos', $exercise->video);
        $imagePath = $this->uploadFile($request, 'image', 'exercises', $exercise->image);

        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
            'video' => $videoPath,
            'image' => $imagePath,
        ]);

        return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully.');
    }

    public function destroy(Exercise $exercise)
    {
        $this->deleteFile($exercise->video);
        $this->deleteFile($exercise->image);

        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}