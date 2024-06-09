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
        Schema::create('tbl_classes', function (Blueprint $table) {
            $table->id('id_class');
            $table->foreignId('id_trainers')->constrained('tbl_trainers', 'id_trainers')->onDelete('cascade');
            $table->string('class_name');
            $table->string('picture')->nullable();
            $table->text('description')->nullable();
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_classes');
    }
};
