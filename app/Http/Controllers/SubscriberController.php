<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all(); // جلب كل السجلات من جدول subscribers
        return view('admin.subscribers.index', compact('subscribers')); // تمرير البيانات للـ View
    }

    public function store(Request $request)
    {
        // تحقق من صحة البريد الإلكتروني
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // حفظ البريد الإلكتروني في قاعدة البيانات
        Subscriber::create([
            'email' => $request->email
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Your Email Sent Successfully!');
    }
}
