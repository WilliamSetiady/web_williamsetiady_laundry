<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //halaman default user
    public function index()
    {
        // orderBy digunakan untuk mengurutkan data berdasarkan id, dan desc=descending
        //$datas dan $title merupakan variable
        $datas = User::orderBy('id', 'desc')->get();
        $title = "User Data";
        // mengambalikan tampilan pada folder user yaitu file index.blade.php
        // compact berfungsi untuk membuat variable yang sudah dibuat di dalam function ini bisa dipanggil di halaman view nantinya
        return view('user.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //function ini untuk membuat user baru
    public function create()
    {
        $title = "Add User";
        $levels = Levels::all();
        return view('user.create', compact('title', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */

    //function ini untuk menambahkan data yang diinput di form ke database user
    public function store(Request $request)
    {
        //User::create() berfungsi untuk membuat record/inputan baru
        //$request->all berfungsi untuk mengambil semua data dari apa yang diinput di form
        User::create($request->all());
        //notifikasi pop up yang diambil dari sweetalert
        toast('Adding data successfuly', 'success');
        //mengembalikan view ke user, defaultnya yaitu index.blade.php
        return redirect()->to('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    // function ini untuk edit data user
    public function edit(string $id)
    {
        //$title variable yang akan dipanggil nantinya
        $title = "User Edit";
        // variable $user, mengambil dari model User untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $user = User::findOrFail($id);
        $levels = Levels::all();
        // mengambalikan tampilan pada folder user yaitu file edit.blade.php
        return view('user.edit', compact('title', 'user', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // variable $user, mengambil dari model User untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $user = User::findOrFail($id);
        //$user->name berfungsi untuk menyimpan data user tersebut ke properti name
        //$request->name mengambil data name dari form input post di halaman edit.blade.php 
        $user->name = $request->name;
        //$user->email berfungsi untuk menyimpan data user tersebut ke properti email
        //$request->email mengambil data email dari form input post di halaman edit.blade.php 
        $user->email = $request->email;
        // if disini berfungsi untuk mengecek apakah dilakukan input data password baru di edit.blade.php
        if ($request->password) {
            //$user->password berfungsi untuk menyimpan data user tersebut ke properti password
            //$request->password mengambil data password dari form input post di halaman edit.blade.php 
            $user->password = $request->password;
        }
        //menyimpan data dari variable user diatas yang sudah dimasukkan 
        $user->save();
        // mengambalikan tampilan pada folder user yaitu file edit.blade.php
        return redirect()->to('user')->with('success', 'Data changed successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // variable $user, mengambil dari model User untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $user = User::findOrFail($id);
        // variable $user diambil fungsi delete
        $user->delete();
        return redirect()->to('user')->with('success', 'Delete Success');
    }
}
