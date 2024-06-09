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
        Schema::create('tbl_userclasses', function (Blueprint $table) {
            $table->id('id_userclass');
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id_booking')->on('tbl_bookings')->onDelete('cascade');
            $table->unsignedBigInteger('id_class');
            $table->foreign('id_class')->references('id_class')->on('tbl_classes')->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_userclasses');
    }
};
