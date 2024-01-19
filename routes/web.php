<?php
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\FilieresController;
use App\Models\Filiere;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::resource('etudiants',EtudiantsController::class);
    Route::resource('filieres',FilieresController::class);
    Route::get('etudiants/{etudiant}/edit', 'App\Http\Controllers\EtudiantsController@edit')->name('etudiants.edit');
    Route::put('etudiants/{etudiant}', 'App\Http\Controllers\EtudiantsController@update')->name('etudiants.update');  // Use PUT method for update
    Route::get('etudiants/{etudiant}/show', 'App\Http\Controllers\EtudiantsController@show')->name('etudiants.show');
    Route::delete('etudiants/{etudiant}', 'App\Http\Controllers\EtudiantsController@destroy')->name('etudiants.destroy');

    Route::get('filieres/{filiere}/edit', 'App\Http\Controllers\FilieresController@edit')->name('filieres.edit');
    Route::put('filieres/{filiere}', 'App\Http\Controllers\FilieresController@update')->name('filieres.update');  // Use PUT method for update
    Route::get('filieres/{filiere}/show', 'App\Http\Controllers\FilieresController@show')->name('filieres.show');
    Route::delete('filieres/{filiere}', 'App\Http\Controllers\FilieresController@destroy')->name('filieres.destroy');

});
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        // Vérifier le rôle de l'utilisateur
        if (auth()->user()) {
            // Rediriger l'administrateur vers la liste des filières
            return redirect()->route('filieres.index');
        } else {
            // Rediriger les autres utilisateurs (par exemple, les étudiants) vers une autre page
            return redirect()->route('dashboard'); // Remplacez 'dashboard' par la route souhaitée
        }
    });

    // ... Autres routes ...

    Route::resource('filieres', FilieresController::class);

    // ... Autres routes ...

});




