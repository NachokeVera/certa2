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
        Schema::create('profesor_propuestas', function (Blueprint $table) {
            $table->integer('propuesta_id');
            $table->string('profesor_rut',10);
            $table->date('fecha');
            $table->time('hora');
            $table->text('comentario');
            $table->timestamps();
            
            $table->foreign('propuesta_id')->references('id')->on('propuestas');
            $table->foreign('profesor_rut')->references('rut')->on('profesores');
            /* $table->primary(['propuesta_id','profesor_rut']); */
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_propuestas');
    }
};
