<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datas = Customers::orderBy('id', 'desc')->get();
        $title = "Customer Data";

        return view('customer.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //function ini untuk membuat user baru
    public function create()
    {
        $title = "Add Customer";
        return view('customer.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */

    //function ini untuk menambahkan data yang diinput di form ke database
    public function store(Request $request)
    {
        //User::create() berfungsi untuk membuat record/inputan baru
        //$request->all berfungsi untuk mengambil semua data dari apa yang diinput di form
        Customers::create($request->all());
        //notifikasi pop up yang diambil dari sweetalert
        toast('Adding data successfuly', 'success');
        //mengembalikan view, defaultnya yaitu index.blade.php
        return redirect()->to('customer');
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
        $title = "Customer Edit";
        // variable $customers, mengambil dari model customers untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $customers = Customers::findOrFail($id);
        // mengambalikan tampilan pada folder level yaitu file edit.blade.php
        return view('customer.edit', compact('title', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // variable $level, mengambil dari model level untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $customer = Customers::findOrFail($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        //menyimpan data dari variable level diatas yang sudah dimasukkan
        $customer->save();
        // mengambalikan tampilan pada folder yaitu file edit.blade.php
        return redirect()->to('customer')->with('success', 'Data changed successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // variable $level, mengambil dari model level untuk: findOrFail = mencari atau akan menghasilkan 404notfound/tidak ditemukan bila tidak ditemukan id nya
        $customer = Customers::findOrFail($id);
        // variable $level diambil fungsi delete
        $customer->delete();
        return redirect()->to('customer')->with('success', 'Delete Success');
    }
}
