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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الجيم
            $table->string('phone'); // رقم الهاتف
            $table->string('image')->nullable(); // صورة الجيم (يمكن أن تكون فارغة)
            $table->text('description')->nullable(); // وصف الجيم (يمكن أن يكون فارغًا)
            $table->timestamps(); // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};