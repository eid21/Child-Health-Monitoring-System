<?php

namespace App\Http\Controllers;

use App\Models\FoodSystem;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class FoodSystemController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $foods = FoodSystem::all();
        return view('admin.foodsystem.index', compact('foods'));
    }

    public function create()
    {
        return view('admin.foodsystem.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'time' => 'required|string|max:255',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'foodsystem');

        FoodSystem::create([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'time' => $request->time,
        ]);

        return redirect()->route('foodsystem.index')->with('success', 'Meal added successfully.');
    }

    public function edit(FoodSystem $foodsystem)
    {
        return view('admin.foodsystem.edit', compact('foodsystem'));
    }

    public function update(Request $request, FoodSystem $foodsystem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'time' => 'required|string|max:255',
        ]);

        $imagePath = $this->uploadFile($request, 'image', 'foodsystem', $foodsystem->image);

        $foodsystem->update([
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description,
            'time' => $request->time,
        ]);

        return redirect()->route('foodsystem.index')->with('success', 'Meal updated successfully.');
    }

    public function destroy(FoodSystem $foodsystem)
    {
        $this->deleteFile($foodsystem->image);
        $foodsystem->delete();

        return redirect()->route('foodsystem.index')->with('success', 'Meal deleted successfully.');
    }
}