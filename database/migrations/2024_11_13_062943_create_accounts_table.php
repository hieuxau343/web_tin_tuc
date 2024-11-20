<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('email', 45)->nullable();
            $table->string('fullname', 50)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('phone', 10)->default(null);
            $table->string('gender', 3)->nullable();
            $table->date('birthday')->nullable();
            $table->string('role', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
