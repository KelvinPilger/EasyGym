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
        Schema::create('workout', function (Blueprint $table) {
            $table->id();
            $table->string('workout_desc', 100);
            $table->date('expiration_date');
            $table->smallInteger('maximum_sections');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout');
    }
};
