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

    public function getAllPets()
    {
        $pets = [
            new Pet(1, "dog", "Buddy", "some\photo\url", '', "available"),
            new Pet(2, "dog", "Amik", "some\photo\url", '', "pending")
        ];
        return view('pet.index', ['pets' => $pets]);
    }

    public function getPetByIDforEdit($id) {
        $pet = new Pet(1, "dog", "Buddy", "some\photo\url", '', "available");

        // from this form put on /pets will be called
        return view('pet.formPet', ['pet' => $pet]);
    }

    public function updateNameStatusOfGivenPet($id) {
        $pet = new Pet(1, "dog", "Buddy", "some\photo\url", '', "available");

        // from this form post on /pets/{id} will be called
        return view('pet.formShort', ['pet' => $pet]);
    }

    public function createNewPet(){}

    public function editExistingPet(){}

    public function getPet($id){}

    public function editPet($id){}

    public function deletePet($id){}

    public function uploadImageForPet($id){}

    public function findPetByStatus($id){}
}
