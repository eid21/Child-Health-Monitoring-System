<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('foodsystem', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الوجبة
            $table->string('image')->nullable(); // صورة الوجبة
            $table->text('description')->nullable(); // وصف الوجبة
            $table->string('time'); // وقت الوجبة (مثل: Breakfast, Lunch, Dinner)
            $table->timestamps(); // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodsystem');
    }
};