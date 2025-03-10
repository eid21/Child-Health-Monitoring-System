<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    // Display all doctors
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }

    // Display the form to add a new doctor
    public function create()
    {
        return view('admin.doctors.create');
    }

    // Store the new doctor in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // الصورة بحد أقصى 2MB
            'speciality' => 'required|string|max:255',
        ]);

        // رفع الصورة إذا تم تحميلها
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('doctors', 'public'); // حفظ الصورة في مجلد `storage/app/public/doctors`
        }

        // إنشاء الدكتور مع مسار الصورة
        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'speciality' => $request->speciality,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

    // Display the form to edit a doctor
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    // Update the doctor details in the database
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // الصورة بحد أقصى 2MB
            'speciality' => 'required|string|max:255',
        ]);

        // تحديث الصورة إذا تم تحميل صورة جديدة
        $photoPath = $doctor->photo;
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }
            // حفظ الصورة الجديدة
            $photoPath = $request->file('photo')->store('doctors', 'public');
        }

        // تحديث بيانات الدكتور
        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => $photoPath,
            'speciality' => $request->speciality,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    // Delete a doctor
    public function destroy(Doctor $doctor)
    {
        // حذف الصورة إذا كانت موجودة
        if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}