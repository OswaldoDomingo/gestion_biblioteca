<?php
use App\Http\Controllers\ApiController;
//Se importa la api  que se va a usar

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Se crea la ruta para la api, con esta recupera todos los libros
Route::get('/libros', [ApiController::class, 'index']);

//Se crea la ruta para la api, con esta se guarda un libro
Route::post('/libros', [ApiController::class, 'store']);

//Se crea la ruta para la api, con esta se borra un libro
//Se pasa el id del libro que se quiere borrar, se pone entre llaves porque no se sabe que valor viene
Route::delete('/libros/{id}', [ApiController::class, 'destroy']);

// Se crea la ruta para la api, con esta recupera todos los autores
Route::get('/autores', [ApiController::class, 'getAuthors']);
