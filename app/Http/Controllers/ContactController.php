<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // جلب كل السجلات من جدول subscriptions
        return view('admin.contact.index', compact('contacts')); // تمرير البيانات للـ View
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function destroy($id)
{
    // البحث عن الرسالة بواسطة الـ ID
    $message = Contact::findOrFail($id);

    // حذف الرسالة
    $message->delete();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->route('contact.index')->with('success', 'Message deleted successfully!');
}
}