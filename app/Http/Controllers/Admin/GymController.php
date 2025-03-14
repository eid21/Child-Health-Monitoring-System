<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Gym;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class GymController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $gyms = Gym::all();
        return view('admin.gyms.index', compact('gyms'));
    }

    public function create()
    {
        return view('admin.gyms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'gyms');

        Gym::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('gyms.index')->with('success', 'Gym added successfully.');
    }

    public function edit(Gym $gym)
    {
        return view('admin.gyms.edit', compact('gym'));
    }

    public function update(Request $request, Gym $gym)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'gyms', $gym->image);

        $gym->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('gyms.index')->with('success', 'Gym updated successfully.');
    }

    public function destroy(Gym $gym)
    {
        $this->deleteFile($gym->image);
        $gym->delete();

        return redirect()->route('gyms.index')->with('success', 'Gym deleted successfully.');
    }
}