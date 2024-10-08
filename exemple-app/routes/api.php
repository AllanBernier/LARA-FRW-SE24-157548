<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StorePictureController;
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
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/hello-world", function () {
    return response()->json([
        'message' => 'Hello from api'
    ]);
});



// localhost:8000/api/hello/toto

Route::get("/hello/{name}", function (String $name) {
    return response()->json([
        'message' => 'Hello from ' . $name
    ]);
});


Route::get("/hello-request-param", function () {
    $name = request()->name;

    return response()->json([
        'message' => 'Hello from ' . $name
    ]);
});


Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);


Route::post('/pages/{book}', [PagesController::class, 'store']);
Route::get('/pages/{book}', [PagesController::class, 'index']);


Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::post('/authors/{author}/attach/{book}', [AuthorController::class, 'attach']);
Route::post('/authors/{author}/detach/{book}', [AuthorController::class, 'detach']);



Route::get('/is-over-18', function (Request $request) {
    return response()->json(['message' => "Vous avez plus de 18 ans"]);
})->middleware(['check.age', 'check.password']);


Route::get('/download/{filename}', [StorePictureController::class, 'download']);
Route::post('/upload', [StorePictureController::class, 'upload']);
Route::delete('/delete/{filename}', [StorePictureController::class, 'delete']);