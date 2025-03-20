<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
class ThemeController extends Controller
{
    public function index(){
        return view('theme.index');
    }

    public function blog(){
        // $blogs = Blog::all(); // جلب جميع المقالات من قاعدة البيانات
        return view('theme.blog');
    }

    public function blogDetails(){
        // $blog = Blog::findOrFail($id); // جلب المقالة المحددة بناءً على الـ ID
        return view('theme.blog-details');
    }

    public function services(){
        return view('theme.services');
    }

    public function contact(){
        return view('theme.contact');
    }

    public function about(){
        $doctors = Doctor::paginate(12)->take(3);
        return view('theme.about' , compact('doctors'));
    }
}

