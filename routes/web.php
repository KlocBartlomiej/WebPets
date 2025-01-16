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

Route::get('/pet/formEdit/{id}', [PetController::class, 'updateAllOfGivenPet']);
Route::get('/pet/uploadImg/{id}', [PetController::class, 'uploadImgForGivenPet']);
Route::get('/pet/update/{id}', [PetController::class, 'updateNameAndStatusOfGivenPet']);

Route::get('/pet', [PetController::class, 'getAllPets']);
Route::post('/pet', [PetController::class, 'createNewPet']);

Route::post('/pet/{id}', [PetController::class, 'editPetNameAndStatus']);
Route::put('/pet', [PetController::class, 'editExistingPet']);
Route::delete('/pet/{id}', [PetController::class, 'deletePet']);

Route::post('/pet/{id}/uploadImage', [PetController::class, 'uploadImageForPet']);

Route::get('/pet/findById', [PetController::class, 'getPet']);
Route::get('/pet/findByStatus', [PetController::class, 'findPetByStatus']);