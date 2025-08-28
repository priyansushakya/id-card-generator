<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('id_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Name on the ID card
            $table->string('photo')->nullable(); // Photo path or filename
            $table->string('email', 100)->unique();
            $table->date('date_of_birth')->nullable(); // Date of birth
            $table->string('address', 255)->nullable(); // Address field
            $table->string('phone', 20)->nullable(); // Phone number field
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_cards');
    }
};
