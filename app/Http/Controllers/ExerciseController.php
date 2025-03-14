<?php

namespace App\Http\Controllers;
use App\Models\Exercise;

class ExerciseController extends Controller {
    public function index() {
        $exercises = Exercise::all();
        return view('theme.exercises', compact('exercises'));
    }
}

