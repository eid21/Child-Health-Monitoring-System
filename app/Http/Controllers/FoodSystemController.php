<?php
namespace App\Http\Controllers;
use App\Models\FoodSystem;

class FoodSystemController extends Controller {
    public function index() {
        $foodItems = FoodSystem::all();
        return view('theme.foods', compact('foodItems'));
    }
}
