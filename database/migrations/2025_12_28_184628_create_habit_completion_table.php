<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('habit_completion', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('day_id')
            //     ->constrained()
            //     ->cascadeOnDelete();

            $table->foreignId('habit_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('completed')->default(false);
            $table->timestamp('completed_at');

            $table->timestamps();

            // $table->unique(['day_id', 'habit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_habit');
    }
};
