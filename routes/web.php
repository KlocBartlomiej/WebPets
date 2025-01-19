<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/petResource', 'pets');
Route::view('/petFromNew', 'pet.formNew');

Route::controller(PetController::class)->group(function () {

    Route::get('/pet/details/{id}', 'detailsOfGivenPet');
    Route::get('/pet/formEdit/{id}', 'updateAllOfGivenPet');
    Route::get('/pet/uploadImg/{id}', 'uploadImgForGivenPet');
    Route::get('/pet/update/{id}', 'updateNameAndStatusOfGivenPet');

    Route::get('/pet', 'getAllPets');
    Route::post('/pet', 'createNewPet');
    Route::put('/pet', 'editExistingPet');

    Route::get('/pet/findById', 'getPet');
    Route::get('/pet/findByStatus', 'findPetByStatus');
    Route::post('/pet/{id}/uploadImage', 'uploadImageForPet');
    Route::post('/pet/{id}', 'editPetNameAndStatus');
    Route::delete('/pet/{id}', 'deletePet');
});
