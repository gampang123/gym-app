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
        Schema::create('tbl_trainers', function (Blueprint $table) {
            $table->id('id_trainers'); 
            $table->string('name');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->string('gender');
            $table->integer('age');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_trainers');
    }
};
