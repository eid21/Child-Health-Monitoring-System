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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم التمرين
            $table->text('description')->nullable(); // وصف التمرين
            $table->string('video')->nullable(); // رابط الفيديو (يمكن أن يكون فارغًا)
            $table->string('image')->nullable(); // رابط الصورة (يمكن أن يكون فارغًا)
            $table->timestamps(); // created_at و updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};