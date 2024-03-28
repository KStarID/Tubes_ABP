<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use App\Http\Controllers\Controller;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('upload-image');
    }

    public function upload(Request $request)
    {
        // Initialize Firebase
        $firebase = (new Factory)
            ->withServiceAccount(env('FIREBASE_CREDENTIALS_PATH'))
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'))
            ->create();

        // Upload image to Firebase Storage
        $storage = $firebase->getStorage();
        $bucket = $storage->getBucket();

        // Upload the file
        $file = $request->file('image');
        $bucket->upload(file_get_contents($file->getPathname()), [
            'name' => 'images/' . $file->getClientOriginalName(),
        ]);

        // Get the download URL
        $object = $bucket->object('images/' . $file->getClientOriginalName());
        $imageUrl = $object->signedUrl(new \DateTime('+5 minutes'));

        return back()->with(['success' => 'Image uploaded successfully.', 'imageUrl' => $imageUrl]);
    }
    
}
