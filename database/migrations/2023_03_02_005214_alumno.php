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
        //
        //
        Schema::create('alumno', function (Blueprint $table) {
            $table->id();
            $table->string('matricula');
            $table->string('nombre');
            $table->string('apellido_materno');
            $table->string('apellido_patoern');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('alumno');
    }
};
