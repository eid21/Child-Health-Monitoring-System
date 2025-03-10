<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Doctor::create([
            'name' => 'دكتور أحمد',
            'description' => 'طبيب عام',
            'phone_number' => '0123456789',
        ]);
    }
}
