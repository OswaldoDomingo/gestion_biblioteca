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
        Schema::create('loabs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('loan_date');//Fecha de prestamo
            $table->date('return_date');//Fecha de devolucion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loabs');
    }
};
