<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    // public function login, nama login disini bebas apa saja.
    // login disini nantinya akan dipanggil di web.php dalam Route
    public function login()
    {
        // return berfungsi untuk memberitahu framework laravel agar hasil view dikirim ke browser. 
        // disini tampilan yang dikirimkan adalah halaman login.blade.php yang ada di views->resources->login.blade.php
        return view('login');
    }

    // Request $request merupakan parameter dari laravel, fungsinya untuk membaca dan mengakses data dari permintaan HTTP
    public function actionLogin(Request $request)
    {
        // melakukan validasi input dari parameter $request.
        // fungsi dari $request->validate ini untuk validasi data input, apakah sudah sesuai dengan aturan yang dibuat
        $request->validate([
            // email memiliki ketentuan, yaitu 
            // required=harus diisi, 
            // email=harus berupa email, dan 
             // unique:users, email = data harus unik antar satu sama lain, data disini diambil dari table users dan kolom email
            'email' => 'required|email',
            // password memiliki ketentuan, yaitu
            // required=password harus diisi
            // min:8=harus berisi minimal 8 karakter
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        // Auth::attempt berfungsi untuk melakukan proses login otomatis berdasarkan data dari $credentials
        // jika berhasil, data seperti email dan password akan disimpan di session dan sudah di autentifikasi
        if (Auth::attempt($credentials)) {
            // session()->regenerate() berfungsi untuk keamanan, karena membuang sesi ID lama dan membuat sesi ID baru. 
            // dilakukan untuk mencegah orang lain memanfaatkan session ID lama
            $request->session()->regenerate();
            // redirect berfungsi untuk mengarahkan pengguna ke halaman lain
            // intended berfungsi untuk mengarahkan ke halaman yang sebelumnya ingin diakses user, jika tidak ada halaman lain yang diakses, maka akan diarahkan ke dashnboard
            return redirect()->intended('dashboard');
        }
        // menampilkan error saat terjadi kesalahan saat input, antara email atau password
        Alert::error('Error', 'Invalid Credentials');
        // back() mengalihkan ke halaman sebelumnya user berada
        // onlyInput() mengirim ulang inputan yang sebelumnya sudah dimasukkan jika halaman terefresh saat terjadi error diatas
        // dalam kasus ini adalah email. halaman akan diisi secara otomatis oleh blade dengan old(email) yang sudah dimasukkan ke dalam value di halaman view login
        return back()->onlyInput('email');
    }

    public function logout()
    {
        // menghapus session yang sudah login saat keluar
        Auth::logout();
        // kembali ke Route default yaitu halaman login
        return redirect('/');
    }
}
