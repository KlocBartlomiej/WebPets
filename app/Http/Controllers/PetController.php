<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use App\Models\Pet;
use GuzzleHttp\Psr7\Request;

class PetController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://petstore.swagger.io/v2/']);
    }

    public function updateAllOfGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id));
        return view('pet.formPet', ['pet' => $pet]);
    }

    public function uploadImgForGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id));
        return view('pet.formImg', ['pet' => $pet]);
    }

    public function updateNameAndStatusOfGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id));
        return view('pet.formShort', ['pet' => $pet]);
    }

    public function getAllPets()
    {
        $pets = self::castToPets(self::request('GET', 'pet/findByStatus?status=available'));
        return view('pet.index', ['pets' => $pets]);
    }

    public function createNewPet()
    {
        echo 'Create a new pet should be triggered';
    }

    public function getPet()
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $_POST['id']));
        return view('pet.index', ['pets' => [$pet]]);
    }

    public function editExistingPet()
    {
        self::request('PUT', 'pet');
        return redirect('/pet');
    }

    public function editPetNameAndStatus($id)
    {
        self::request('POST', 'pet/' . $id);
        return redirect('/pet');
    }

    public function deletePet($id)
    {
        self::request('DELETE', 'pet/' . $id);
        return redirect('/pet');
    }

    public function uploadImageForPet($id)
    {
        self::request('POST', 'pet/' . $id . '/uploadImage');
        return redirect('/pet');
    }

    public function findPetByStatus()
    {
        $pets = self::castToPets(self::request('GET', 'pet/findByStatus?status=' . $_POST['status']));
        return view('pet.index', ['pets' => $pets]);
    }

    private function request(string $method, string $url, array $headers = [], string $payload = ''): string
    {
        $base_headers = [
            'Content-type' => "application/json"
        ];

        $headers = array_merge($headers, $base_headers);

        $request = new Request($method, $url, $headers, $payload);

        $response = $this->client->send($request);

        if($response->getStatusCode() != 200) {
            abort($response->getStatusCode());
        }

        return $response->getBody()->getContents();
    }

    private function castToPets($json): array
    {
        $results = json_decode($json, true);
        $pets = [];

        foreach ($results as $result) {
            $pets[] = new Pet($result);
        }

        return $pets;
    }

    private function castToPet($json): Pet
    {
        return new Pet(json_decode($json, true));
    }
}
