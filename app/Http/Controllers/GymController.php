<?php
namespace App\Http\Controllers;
use App\Models\Gym;

class GymController extends Controller {
    public function index() {
        $gyms = Gym::all();
        return view('theme.gyms', compact('gyms'));
    }
}

