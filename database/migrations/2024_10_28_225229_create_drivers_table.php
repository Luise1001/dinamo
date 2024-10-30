<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('document')->unique();
            $table->string('phone')->unique();
            $table->string('license_number')->unique();
            $table->string('license_type');
            $table->date('license_expiration');
            $table->unsignedBigInteger('responsible_id');
            $table->boolean('available')->default(true);
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
