<?php

namespace App\Http\Controllers\Firebase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Database;
use Session;
use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Database\ServerValue;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function __construct(Database $database, Storage $storage)
    {
        $this->database = $database;
        $this->tablenames = 'news';
        $this->storage = $storage;
    }

    public function index()
    {
        $author = auth()->user()->email;
        $references = $this->database->getReference($this->tablenames)->orderByKey()->getValue();
        $reference = array_reverse($references, true);
        return view('news.news_admin', compact('reference', 'author'));
    }

    public function show_news($id)
    {
        // Mengambil data mobil dari Firebase berdasarkan ID atau kunci mobil
        $key = $id;
        $news = $this->database->getReference($this->tablenames . '/' . $id)->getValue();
        $author = auth()->user()->email;
        // Jika data mobil tidak ditemukan, redirect ke halaman lain atau tampilkan pesan kesalahan
        if (!$news) {
            return redirect('/home/news')->with('status', 'Car not found');
        }

        // Mengirim data mobil ke view 'product_details.blade.php'
        return view('news_details', compact('news', 'author', 'key'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $author = auth()->user()->email;

        $now = Carbon::now('Asia/Jakarta');

        $post_data = [
            'image' => 'https://community.gamedev.tv/uploads/db2322/original/3X/9/7/9780f0418136d061a49edef8a94c8d88e1ad1642.jpeg',
            'judul' => $request->judul,
            'tanggal' => $now->toDateTimeString(),
            'waktu' => $now->toDateTimeString(),
            'author' => $author,
            'isi' => $request->isi,
        ];
        $postRef = $this->database->getReference($this->tablenames)->push($post_data);
        if ($postRef) {
            Session::flash('message', 'Add Cars Success');
            return redirect('/home/news')->with('status', 'Success');
        } else {
            return redirect('/home/news')->with('status', 'error');
        }
    }

    public function delete_news($id)
    {
        $key = $id;
        $del_cars = $this->database->getReference($this->tablenames . '/' . $key)->remove();
        if ($del_cars) {
            Session::flash('delete', 'Delete Cars Success');
            return redirect('/home/news');
        } else {
            return redirect('/home/news')->with('status', 'Delete not Success');
        }
    }

    public function edit_news($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablenames)->getChild($key)->getValue();
        if ($editdata) {
            return view('news.edit_news', compact('editdata', 'key'));
        } else {
            return redirect('news.news')->with('status', 'error');
        }
    }

    public function update_news(Request $request, $id)
    {
        $key = $id;
        $now = Carbon::now('Asia/Jakarta');
        $author = auth()->user()->email;
        $update_data = [
            'judul' => $request->judul,
            'tanggal' => $now->toDateTimeString(),
            'waktu' => $now->toTimeString(),
            'author' => $author,
            'isi' => $request->isi,
        ];
        $res_updated = $this->database->getReference($this->tablenames . '/' . $key)->update($update_data);
        if ($res_updated) {
            Session::flash('edit', 'Edit News Success');
            return redirect('/home/news')->with('status', 'updated');
        } else {
            return redirect('news.news')->with('status', 'error');
        }
    }

    public function storeimage(Request $request, $id)
    {
        // Validasi request untuk memastikan file gambar telah disertakan
        $request->validate([
            'image' => 'required|image',
        ]);

        $key = $id;

        // Ambil file gambar dari request
        $image = $request->file('image');

        // Path penyimpanan di Firebase Storage
        $storagePath = 'Images/';

        // Generate nama file unik
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Simpan file gambar ke Firebase Storage
        $this->storage->getBucket()->upload(
            file_get_contents($image->getRealPath()),
            [
                'name' => $storagePath . $fileName,
            ]
        );

        $signedUrl = $this->storage->getBucket()->object($storagePath . $fileName)->signedUrl(new \DateTime('+5 minutes'));

        $post_data = [
            'image' => $signedUrl
        ];

        $res_updated = $this->database->getReference($this->tablenames . '/' . $key)->update($update_data);
        if ($res_updated) {
            Session::flash('message', 'New News Created');
            return back()->withInput()->with('status', 'Success');
        } else {
            return redirect('/home')->with('status', 'error');
        }

        // Tambahkan pesan sukses ke sesi
        Session::flash('message', 'Successfully Uploaded');

        // Redirect kembali ke halaman sebelumnya
        return back();
    }
}
