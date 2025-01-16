<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

//simple views
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

//my forms
Route::get('/pet/formEdit/{id}', [PetController::class, 'updateAllOfGivenPet']);
Route::get('/pet/uploadImg/{id}', [PetController::class, 'uploadImgForGivenPet']);
Route::get('/pet/update/{id}', [PetController::class, 'updateNameAndStatusOfGivenPet']);

//routes which are meant to communicate with external api
Route::get('/pet', [PetController::class, 'getAllPets']);
Route::post('/pet', [PetController::class, 'createNewPet']);
Route::put('/pet', [PetController::class, 'editExistingPet']);

Route::post('/pet/{id}', [PetController::class, 'editPetNameAndStatus']);
Route::delete('/pet/{id}', [PetController::class, 'deletePet']);

Route::get('/pet/findById', [PetController::class, 'getPet']);
Route::get('/pet/findByStatus', [PetController::class, 'findPetByStatus']);
Route::post('/pet/{id}/uploadImage', [PetController::class, 'uploadImageForPet']);