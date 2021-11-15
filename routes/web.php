<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ResourceController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::resource('resource', ResourceController::class);
//Route::resource('resource', ResourceController::class, ['names' => 'recurso']);
Route::fallback([IndexController::class, 'error404'])->name('404');

/*Route::get('about', [IndexController::class, 'about'])->name('acerca');
Route::get('shop', [IndexController::class, 'shop'])->name('shop');
Route::get('param/{id}', [IndexController::class, 'parametro'])->name('param');
Route::get('paramopcional/{id?}', [IndexController::class, 'parametroOpcional'])->name('paramopcional');*/

//use App\Http\Controllers\PrimerControlador;
//use App\Http\Controllers\SegundoControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('about', [IndexController::class, 'about'])->name('about');*/

/*Route::get('/', function () {
    return view('index');
});

Route::get('curso202122/php/ejercicio1.php', function() {
    return '<h1>hola mundo</h1><h2>https://informatica.ieszaidinvergeles.org:10001/laraveles/primeraApp/public/curso202122/php/ejercicio1.php</h2>';
});

Route::get('hola', function() {
    //echo '<h1>hola</h1>';
    //return redirect('../../../info.php');
    //return file_get_contents('https://informatica.ieszaidinvergeles.org:10001/info.php');
    //return file_get_contents('https://example.org');
    $text = file_get_contents('https://google.es');
    $text = str_replace('action="/search"', 'action="search"', $text);
    return $text;
});

Route::get('hola2', function() {
    return '<h1>hola</h1>';
});
Route::get('search', function() {
    return '<h1>esto es la respuesta</h1>';
});
Route::get('esto', function() {
    echo 'hola mundo';
    return 'hello world';
});
Route::get('primer/ruta1', [PrimerControlador::class, 'ruta1']);

//inyección de dependencias
//crud - c post, r get, u put, d delete
Route::get('enlaces', [SegundoControlador::class, 'enlaces']);
Route::get('segundo/enlaces', [SegundoControlador::class, 'enlaces']);
Route::get('segundo/index', [SegundoControlador::class, 'index']);
Route::get('segundo/create', [SegundoControlador::class, 'create']);
Route::get('segundo/store', [SegundoControlador::class, 'store']);
Route::get('segundo/show/{id}', [SegundoControlador::class, 'show']);
Route::get('segundo/edit/{id}', [SegundoControlador::class, 'edit']);
Route::get('segundo/update/{id}', [SegundoControlador::class, 'update']);
Route::get('segundo/destroy/{id}', [SegundoControlador::class, 'destroy']);

//Route::post('segundo/destroy/{id}', [SegundoControlador::class, 'destroy']);
//Route::delete('segundo/destroy/{id}', [SegundoControlador::class, 'destroy']);
//Route::put('segundo/destroy/{id}', [SegundoControlador::class, 'destroy']);

Route::resource('rsegundo', SegundoControlador::class);
Route::delete('rsegundo/alternativo/{id}', [SegundoControlador::class, 'destroy']);

Route::get('vista1', function() {
    return view('plantilla1.subplantilla.secondmain');
    
});
Route::get('vista2', [SegundoControlador::class, 'verplantilla']);
Route::get('base', [SegundoControlador::class, 'base']);*/