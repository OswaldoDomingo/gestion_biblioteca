<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Se importa la clase Books
use App\Models\Books;

class ApiController extends Controller
{
    //Se crea la petición
    //Creamos el método index
    public function index()
    {
        //Se hace una consulta a la base de datos
        //Se obtienen todos los libros con el autor
        $libros = Books::with('author')->get();
        //Se devuelve los datos de todos los libros
        return response()->json($libros);
    }
    // Creamos el método store
    // El la práctica antes de guardar un libro se debe comprobar que el autor existe y 
    // no he visto en ningún momento que los haya creado, lo he tenido que hacer a mano.
    public function store(Request $request)
    {
        //Qué valores aceptamos en la petición
        try {
            //Se crea un nuevo libro
            $request->validate([
                //Se requiere el título y ha de ser una cadena de texto
                'title' => 'required|string',
                //Se requiere published_year y author_id y ha de ser un entero
                'author_id' => 'required|integer',
                'published_year' => 'required|integer'
            ]);

            //Se crea un nuevo libro
            $book = new Books();
            //Se asignan los valores a los campos
            $book->title = $request->input('title');
            $book->author_id = $request->input('author_id');
            $book->published_year = $request->input('published_year');
            $book->save();
            //Se devuelve el libro creado
            return response()->json($book, 201);

        } catch (\Exception $e) {
            //Controlamos la excepción
            return response()->json(['error' => $e], 500);
        }
    }

    // Creamos el método destroy
    public function destroy($id)
    {
        //Se busca el libro por el id que es el nombre de variable que se ha puesto en el fichero api.php
        $book = Books::find($id);
        //Se comprueba si existe
        if ($book) {
            //Si existe se borra el libro
            $book->delete();
            //Se devuelve el libro borrado
            return response()->json($book, 200);
        } else {
            //Se devuelve un error
            return response()->json(['error' => 'Libro no encontrado'], 404);
        }
        //En el video lo pone al rrevés, primero comprueba si no existe
    }
}
