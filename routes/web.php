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
    // from this form post on /pets will be called
    return view('pet.formNew');
});

// /pet/formEdit/{$id}  -> show form but with populated fields
Route::get('/pet/formEdit/{id}', [PetController::class, 'getPetByIDforEdit']);

// /pet/update/{$id}    -> show details but less inputs
Route::get('/pet/update/{id}', [PetController::class, 'updateNameStatusOfGivenPet']);

// /pet/delete/{$id}    -> just delete and redirect to pet/index
// TODO: no need for get request, it doesn't need another view before
Route::get('/pet/delete/{id}', function () {
    // from this form delete on /pets/{id} will be called
    //return view('pet.');
});

Route::get('/pets', [PetController::class, 'getAllPets']);
Route::post('/pets', [PetController::class, 'createNewPet']);
Route::put('/pets', [PetController::class, 'editExistingPet']);

Route::get('/pets/{id}', [PetController::class, 'getPet']);
Route::post('/pets/{id}', [PetController::class, 'editPet']);
Route::delete('/pets/{id}', [PetController::class, 'deletePet']);

Route::post('/pets/{id}/uploadImage', [PetController::class, 'uploadImageForPet']);
Route::post('/pets/{id}/findByStatus', [PetController::class, 'findPetByStatus']);
