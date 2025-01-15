<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/petResource', function () {
    return view('pets');
});

Route::get('/petFromNew', function () {
    return view('pet.formNew');
});

// /pet/formEdit/{$id}
// /pet/delete/{$id}
Route::get('/pets',[PetController::class, 'getAllPets']);
//Route::post('/pets', [PetController::class, 'createNewPet']);