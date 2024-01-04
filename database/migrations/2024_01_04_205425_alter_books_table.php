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
        //Nombre de la tabla que vamos a utilizar
        Schema::table('books', function (Blueprint $table) {
            //Agregamos la columna author
            //unsignedBigInteger es un entero sin signo
            //La ponemos como nullable para que no nos de error si ya tenemos registror en la tabla
            $table->unsignedBigInteger('author_id')->nullable();
            //Decimos que es una clave foránea author_id que hace referencia a la columna id de la tabla authors
            //$table->foreign('author_id')->references('id')->on('authors');
            //->onDelete('set null') Si eliminamos un autor, los libros que tenga ese autor se ponen a null y no se eliminan los libros
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
