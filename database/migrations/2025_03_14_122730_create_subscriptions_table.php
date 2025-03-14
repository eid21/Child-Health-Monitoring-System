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
    Schema::create('subscriptions', function (Blueprint $table) {
        $table->id();
        $table->string('email')->unique(); // Store the email address
        $table->timestamps(); // Adds created_at and updated_at columns
    });
}

public function down()
{
    Schema::dropIfExists('subscriptions');
}
};
