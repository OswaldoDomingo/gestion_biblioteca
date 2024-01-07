<?php
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
//Se importa la api  que se va a usar

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// Rutas de autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']); // Obtener usuario autenticado
    Route::post('/logout', [AuthController::class, 'logout']); // Cerrar sesión
});

//Definiendo dos rutas dentro de un grupo de middleware. El middleware es una forma de filtrar las solicitudes HTTP en tu aplicación. middleware auth:sanctum proporcionado por Laravel Sanctum, que es un sistema de autenticación ligero para las API basadas en tokens.
// El método group permite agrupar varias rutas que comparten atributos comunes, como middleware o prefijos de ruta. En este caso, todas las rutas definidas dentro de la función de cierre compartirán el middleware auth:sanctum.
// Dentro del grupo de middleware hay dos rutas:
// Route::get('/user', [AuthController::class, 'user']);: Esta es una ruta GET a '/user'. Cuando se hace una solicitud GET a '/user', Laravel ejecutará el método user en AuthController. Este método debería devolver la información del usuario autenticado.
// Route::post('/logout', [AuthController::class, 'logout']);: Esta es una ruta POST a '/logout'. Cuando se hace una solicitud POST a '/logout', Laravel ejecutará el método logout en AuthController. Este método debería manejar el cierre de sesión del usuario.

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
 // Iniciar sesión
