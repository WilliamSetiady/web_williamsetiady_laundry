<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datas = Levels::orderBy('id', 'desc')->get();
        $title = "Level Data";

        return view('level.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //function ini untuk membuat user baru
    public function create()
    {
        $title = "Add Level";
        return view('level.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */

    //function ini untuk menambahkan data yang diinput di form ke database
    public function store(Request $request)
    {
        //User::create() berfungsi untuk membuat record/inputan baru
        //$request->all berfungsi untuk mengambil semua data dari apa yang diinput di form
        Levels::create($request->all());
        //notifikasi pop up yang diambil dari sweetalert
        toast('Adding data successfuly', 'success');
        //mengembalikan view, defaultnya yaitu index.blade.php
        return redirect()->to('level');
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
        $title = "Level Edit";
        // variable $levels, mengambil dari model Levels untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $levels = Levels::findOrFail($id);
        // mengambalikan tampilan pada folder level yaitu file edit.blade.php
        return view('level.edit', compact('title', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // variable $level, mengambil dari model level untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $level = Levels::findOrFail($id);

        $level->name = $request->name;

        //menyimpan data dari variable level diatas yang sudah dimasukkan
        $level->save();
        // mengambalikan tampilan pada folder yaitu file edit.blade.php
        return redirect()->to('level')->with('success', 'Data changed successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // variable $level, mengambil dari model level untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $level = Levels::findOrFail($id);
        // variable $level diambil fungsi delete
        $level->delete();
        return redirect()->to('level')->with('success', 'Delete Success');
    }
}
