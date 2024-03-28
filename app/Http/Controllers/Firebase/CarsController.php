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
        $this->tablename = 'cars';
    }

    public function index()
    {

        $reference = $this->database->getReference($this->tablename)->getValue();
        return view('adminpage.cars', compact('reference'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $email_penjual = auth()->user()->email;

        $post_data = [
            'merk' => $request->merk,
            'model' => $request->model,
            'harga' => $request->harga,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'kondisi' => $request->kondisi,
            'bahan_bakar' => $request->bahan_bakar,
            'transmisi' => $request->transmisi,
            'warna' => $request->warna,
            'deskripsi' => $request->deskripsi,
            'kontak_penjual' => $request->kontak_penjual,
            'email_penjual' => $email_penjual,
        ];
        $postRef = $this->database->getReference($this->tablename)->push($post_data);
        if ($postRef) {
            Session::flash('message', 'New Cars Created');
            return back()->withInput()->with('status', 'Success');
        } else {
            return redirect('/home/admin')->with('status', 'error');
        }
    }
}
