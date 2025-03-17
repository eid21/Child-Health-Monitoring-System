<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // التأكد إذا كان الأدمن موجود مسبقًا لتجنب التكرار
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com', // غيره للإيميل اللي تريده
                'password' => Hash::make('password123'), // غير الباسورد
                'is_admin' => 22, // تأكد إن العمود is_admin موجود في جدول users
            ]);
        } else {
            echo "Admin user already exists. Skipping...\n";
        }
    }
}
