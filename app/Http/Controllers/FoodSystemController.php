<?php

namespace App\Http\Controllers;

use App\Models\FoodSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodSystemController extends Controller
{
    // Display all meals
    public function index()
    {
        $foods = FoodSystem::all(); // Fetch all meals from the database
        return view('admin.foodsystem.index', compact('foods')); // Pass meals to the view
    }

    // Display the form to add a new meal
    public function create()
    {
        return view('admin.foodsystem.create'); // Return the create meal view
    }

    // Store the new meal in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
            'description' => 'nullable|string', // Description is optional
            'time' => 'required|string|max:255', // Time is required
        ]);

        // Upload the image if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('foodsystem', 'public'); // Save the image in storage/app/public/foodsystem
        }

        // Create the meal in the database
        FoodSystem::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'time' => $request->time,
        ]);

        // Redirect to the meals list with a success message
        return redirect()->route('foodsystem.index')->with('success', 'Meal added successfully.');
    }

    // Display the form to edit a meal
    public function edit(FoodSystem $foodsystem)
    {
        return view('admin.foodsystem.edit', compact('foodsystem')); // Pass the meal to the edit view
    }

    // Update the meal's details in the database
    public function update(Request $request, FoodSystem $foodsystem)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Name is required
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image must be a valid image file (max 2MB)
            'description' => 'nullable|string', // Description is optional
            'time' => 'required|string|max:255', // Time is required
        ]);

        // Update the image if a new one is uploaded
        $imagePath = $foodsystem->image;
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // Save the new image
            $imagePath = $request->file('image')->store('foodsystem', 'public');
        }

        // Update the meal in the database
        $foodsystem->update([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'time' => $request->time,
        ]);

        // Redirect to the meals list with a success message
        return redirect()->route('foodsystem.index')->with('success', 'Meal updated successfully.');
    }

    // Delete a meal
    public function destroy(FoodSystem $foodsystem)
    {
        // Delete the image if it exists
        if ($foodsystem->image && Storage::disk('public')->exists($foodsystem->image)) {
            Storage::disk('public')->delete($foodsystem->image);
        }

        // Delete the meal from the database
        $foodsystem->delete();

        // Redirect to the meals list with a success message
        return redirect()->route('foodsystem.index')->with('success', 'Meal deleted successfully.');
    }
}