<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Storage;
use App\Http\Controllers\Controller;

class StorageController extends Controller
{
    protected $storage;

    public function __construct()
    {
        $this->storage = app('firebase.storage');
    }

    public function index()
    {
        return view('Firebase\contact\upload-image');
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');

        // Specify the path where you want to store the file in Firebase Storage
        $filePath = 'uploads/';

        // Upload the file to Firebase Storage
        $this->storage->upload($filePath, file_get_contents($file->path()));

        // Optionally, you can also specify metadata for the uploaded file
        // For example, to set content type:
        // $this->storage->upload($filePath, file_get_contents($file->path()), ['contentType' => $file->getMimeType()]);

        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    public function download(Request $request)
    {
        // Perform download logic
        // Example: Download a file
        $bucket = $this->storage->getBucket();
        $object = $bucket->object('path/to/uploaded/file.jpg');
        $content = $object->download()->getContent();

        // You can then return the file content as a response
        return response()->make($content, 200, [
            'Content-Type' => 'image/jpeg', // Set appropriate content type
            'Content-Disposition' => 'attachment; filename="file.jpg"',
        ]);
    }
}
