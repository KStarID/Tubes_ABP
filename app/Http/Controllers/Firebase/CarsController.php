<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Session;
use Kreait\Firebase\Exception\FirebaseException;



class CarsController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'data';
    }

    public function index()
    {

        $reference = $this->database->getReference($this->tablename)->getValue();
        return view('welcome', compact('reference'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $post_data = [
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'title' => $request->title,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($post_data);
        if ($postRef) {
            Session::flash('message', 'New Cars Created');
            return back()->withInput();
        } else {
            return redirect('/home/admin')->with('status', 'error');
        }
    }
}
