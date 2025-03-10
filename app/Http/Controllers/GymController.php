<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GymController extends Controller
{
    // Display all gyms
    public function index()
    {
        $gyms = Gym::all(); // Fetch all gyms from the database
        return view('admin.gyms.index', compact('gyms')); // Pass gyms to the view
    }

    // Display the form to add a new gym
    public function create()
    {
        return view('admin.gyms.create'); // Return the create gym view
    }

    // Store the new gym in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'phone' => 'required|string|max:20', // Phone is required
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
            'description' => 'nullable|string', // Description is optional
        ]);

        // Upload the image if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gyms', 'public'); // Save the image in storage/app/public/gyms
        }

        // Create the gym in the database
        Gym::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        // Redirect to the gyms list with a success message
        return redirect()->route('gyms.index')->with('success', 'Gym added successfully.');
    }

    // Display the form to edit a gym
    public function edit(Gym $gym)
    {
        return view('admin.gyms.edit', compact('gym')); // Pass the gym to the edit view
    }

    // Update the gym's details in the database
    public function update(Request $request, Gym $gym)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'phone' => 'required|string|max:20', // Phone is required
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
            'description' => 'nullable|string', // Description is optional
        ]);

        // Update the image if a new one is uploaded
        $imagePath = $gym->image;
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Save the new image
            $imagePath = $request->file('image')->store('gyms', 'public');
        }

        // Update the gym in the database
        $gym->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        // Redirect to the gyms list with a success message
        return redirect()->route('gyms.index')->with('success', 'Gym updated successfully.');
    }

    // Delete a gym
    public function destroy(Gym $gym)
    {
        // Delete the image if it exists
        if ($gym->image && Storage::disk('public')->exists($gym->image)) {
            Storage::disk('public')->delete($gym->image);
        }

        // Delete the gym from the database
        $gym->delete();

        // Redirect to the gyms list with a success message
        return redirect()->route('gyms.index')->with('success', 'Gym deleted successfully.');
    }
}