<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Traits\FileUploadTrait;

class DoctorController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'speciality' => 'required|string|max:255',
        ]);

        $photoPath = $this->uploadFile($request, 'photo', 'doctors');

        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'speciality' => $request->speciality,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'speciality' => 'required|string|max:255',
        ]);

        $photoPath = $this->uploadFile($request, 'photo', 'doctors', $doctor->photo);

        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'speciality' => $request->speciality,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        $this->deleteFile($doctor->photo);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
