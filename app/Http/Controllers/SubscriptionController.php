<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscribers = Subscription::all(); // جلب كل السجلات من جدول subscriptions
        return view('admin.subscribers.index', compact('subscribers')); // تمرير البيانات للـ View
    }
    public function store(Request $request)
    {

     
        // Validate the request
        $request->validate([
            'EMAIL' => 'required|email|unique:subscriptions,email',
        ], [
            'EMAIL.required' => 'Email address is required',
            'EMAIL.email' => 'Please enter a valid email address',
            'EMAIL.unique' => 'This email is already subscribed'
        ]);

        // Save the email to the database
        Subscription::create([
            'email' => $request->input('EMAIL'),
        ]);

        // Return with success message
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    }
}