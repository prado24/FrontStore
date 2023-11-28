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
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tallas_id')->nullable();
            $table->foreign('tallas_id')->references('id')->on('tallas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('tallas_id')->nullable();
            $table->foreign('tallas_id')->references('id')->on('tallas');
        });
    }
};
