<?php

namespace App\Http\Controllers;
use App\Models\Exercise;

class ExerciseController extends Controller {
    public function index() {
        $exercises = Exercise::paginate(12);
        return view('theme.exercises', compact('exercises'));
    }
}

