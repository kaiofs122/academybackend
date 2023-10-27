<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    // public function index() {}

    public static function store(Request $request)
    {
        $firebase = (new Factory)
            ->withServiceAccount('C:\Users\lucas\Documents\Projetos\Estágio\backend\academybackend\firebase-adminsdk.json')
            ->withDatabaseUri("https://estagio-academy-default-rtdb.firebaseio.com/");

        $database = $firebase->createDatabase();

        $storage = $firebase->createStorage();
        
        $bucket = $storage->getBucket();

        $studentPhoto = $request->file('photo');

        if ($studentPhoto) {
            $destination = 'studentsPhotos/' . $studentPhoto->getClientOriginalName();
            $bucket->upload(
                file_get_contents($studentPhoto),
                ['name' => $destination]
            );
            $downloadUrl = $bucket->object($destination)->signedUrl(new \DateTime('now + 100 years'));
            return $downloadUrl;
        } else {
            return response()->json(['message' => 'Nenhuma imagem foi recebida'], 400);
        }
    }

    // public function edit(Request $request) {}

    // public function delete(Request $request) {}
}
