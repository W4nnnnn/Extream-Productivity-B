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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('strategy');
            $table->text('task');
            $table->string('owner');
            $table->date('start');
            $table->date('due');
            $table->enum('status', ['Not Started', 'In Progress', 'Blocked', 'Done']);
            $table->integer('progress')->default(0); // 0-100
            $table->string('kpi');
            $table->string('target');
            $table->text('notes')->nullable();
            $table->foreignId('cycle_id')->constrained('cycles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
