<?php


namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
class DoctorController extends Controller {
    public function index() {
        $doctors = Doctor::paginate(12);
        return view('theme.doctors', compact('doctors'));
    }
}

