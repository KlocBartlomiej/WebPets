<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use App\Models\Pet;

class PetController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function updateAllOfGivenPet($id)
    {
        $pet = new Pet(1, "dog", "Buddy", "some\photo\url", '', "available");
        return view('pet.formPet', ['pet' => $pet]);
    }

    public function uploadImgForGivenPet() {
        $pet = new Pet(1, "dog", "Buddy", "some\photo\url", '', "available");
        return view('pet.formImg', ['pet' => $pet]);
    }

    // it needs only id and a file
    public function updateNameAndStatusOfGivenPet($id)
    {
        $pet = new Pet(1, "dog", "Buddy", "some\photo\url", '', "available");
        return view('pet.formShort', ['pet' => $pet]);
    }

    // get on /pet/findByStatus for all statuses
    // and redirect to /pet so call of getAllPets()
    public function getAllPets($status = ["available", "pending", "sold"])
    {
        $pets = [
            new Pet(1, "dog", "Buddy", "some\photo\url", '', "available"),
            new Pet(2, "dog", "Amik", "some\photo\url", '', "pending")
        ];
        return view('pet.index', ['pets' => $pets]);
    }

    // post on /pet
    // and redirect to /pet so call of getAllPets()
    public function createNewPet()
    {
        echo 'Create a new pet should be triggered';
    }

    // put on /pet
    // and redirect to /pet so call of getAllPets()
    public function editExistingPet()
    {
        echo 'Edit of all pet\' data should be triggered';
    }

    // not yet added
    // get on /pet/{id} requires only id
    // and call view which getAllPets() is calling, but with different data
    // for this function $id is inside the request
    public function getPet()
    {
        echo 'Get a pet should be triggered';
    }

    // post on /pet/{id}
    // and redirect to /pet so call of getAllPets()
    public function editPetNameAndStatus($id)
    {
        echo 'Edit a pet\' name and status should be triggered';
    }

    // delete on /pet/{id}
    // and redirect to /pet so call of getAllPets()
    public function deletePet($id)
    {
        echo 'Delete a pet should be triggered';
    }

    // post on /pet/{id}/uploadImage
    // and redirect to /pet so call of getAllPets()
    public function uploadImageForPet($id)
    {
        echo 'Upload of an image for a pet should be triggered';
    }

    // not yet added
    // get on /pet/findByStatus for all selected status
    // so simply call to /pet so call getAllPets() with selected status
    // for this function $status is inside the request
    public function findPetByStatus()
    {
        echo 'Find pets by status should be triggered';
    }
}
