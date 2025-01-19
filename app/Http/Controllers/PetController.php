<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use App\Models\Pet;
use Exception;
use GuzzleHttp\BodySummarizer;
use GuzzleHttp\Psr7\Request;

class PetController extends Controller
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://petstore.swagger.io/v2/']);
    }

    public function detailsOfGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id, [
            'Content-type' => "application/json"
        ]));
        return view('pet.petDetails', ['pet' => $pet]);
    }

    public function updateAllOfGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id, [
            'Content-type' => "application/json"
        ]));
        return view('pet.formPet', ['pet' => $pet]);
    }

    public function uploadImgForGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id, [
            'Content-type' => "application/json"
        ]));
        return view('pet.formImg', ['pet' => $pet]);
    }

    public function updateNameAndStatusOfGivenPet($id)
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $id, [
            'Content-type' => "application/json"
        ]));
        return view('pet.formShort', ['pet' => $pet]);
    }

    public function getAllPets()
    {
        $pets = self::castToPets(self::request('GET', 'pet/findByStatus?status=available', [
            'Content-type' => "application/json"
        ]));
        return view('pet.index', ['pets' => $pets]);
    }

    public function createNewPet()
    {
        $pet = self::formToJson($_POST['id'], $_POST['category'], $_POST['name'], $_POST['photoUrls'], $_POST['tags'], $_POST['status']);

        self::request('POST', 'pet', [
            'Content-type' => "application/json"
        ], $pet);
        return redirect('/pet');
    }

    public function getPet()
    {
        $pet = self::castToPet(self::request('GET', 'pet/' . $_POST['id'], [
            'Content-type' => "application/json"
        ]));
        return view('pet.index', ['pets' => [$pet]]);
    }

    public function editExistingPet()
    {
        $pet = self::formToJson($_POST['id'], $_POST['category'], $_POST['name'], $_POST['photoUrls'], $_POST['tags'], $_POST['status']);

        self::request('PUT', 'pet', [
            'Content-type' => "application/json"
        ], $pet);
        return redirect('/pet');
    }

    public function editPetNameAndStatus($id)
    {
        $form = [
            'name' => $_POST['name'],
            'status' => $_POST['status']
        ];
        self::request('POST', 'pet/' . $id . '?' . http_build_query($form, '', '&'), [
            'Content-type' => 'application/x-www-form-urlencoded',
        ]);
        return redirect('/pet');
    }

    public function deletePet($id)
    {
        self::request('DELETE', 'pet/' . $id, [
            'Content-type' => "application/json"
        ]);
        return redirect('/pet');
    }

    public function uploadImageForPet($id)
    {// TODO: WIP
        // self::request('POST', 'pet/' . $id . '/uploadImage',[//?file=' . $_POST['file-upload'] . '&type=image/jpeg', [
        //     'Content-type' => "multipart/form-data",
        //     'multipart' => [
        //     [
        //         'name'     => 'image',
        //         'contents' => fopen($_POST['file-upload'] , 'r')
        //     ]
        // ]
        // ]);
        // return redirect('/pet');
    }

    public function findPetByStatus()
    {
        $pets = self::castToPets(self::request('GET', 'pet/findByStatus?status=' . $_POST['status'], [
            'Content-type' => "application/json"
        ]));
        return view('pet.index', ['pets' => $pets]);
    }

    private function request(string $method, string $url, array $headers, string $payload = ''): string
    {
        $request = new Request($method, $url, $headers, $payload);

        $response = $this->client->send($request);

        if ($response->getStatusCode() != 200) {
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

    private function formToJson($id, $category, $name, $photoUrls, $tags, $status): string
    {
        $petJson = '{"id" : ' . $id . ',"category" : {"id" : 0,"name" : "' . $category . '"},"name" : "' . $name . '","photoUrls" : [';

        foreach (explode(',', $photoUrls) as $photoUrl) {
            $petJson .= '"' . $photoUrl . '",';
        }

        $petJson = substr_replace($petJson, '', -1);
        $petJson .= '],"tags" : [';

        $id = 0;
        foreach (explode(',', $tags) as $tag) {
            $petJson .= '{"id" : ' . $id++ . ',"name" : "' . $tag . '"},';
        }

        $petJson = substr_replace($petJson, '', -1);
        $petJson .= '],"status" : "' . $status . '"}';

        return $petJson;
    }
}
