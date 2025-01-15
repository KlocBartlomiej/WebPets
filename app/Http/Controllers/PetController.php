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
            new Pet(1, ["dog"], "Buddy", ["some\photo\url"], [], "available"),
            new Pet(1, ["dog"], "Amik", ["some\photo\url"], [], "pending")
        ];
        return view('pet.index', ['pets' => $pets]);
    }
}
