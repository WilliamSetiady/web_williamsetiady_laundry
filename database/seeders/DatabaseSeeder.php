<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //fungsi call ini untuk menjalankan seeder apa yang ada didalamnya sehingga dapat memasukkan data kedalam database masing-masing
        //untuk salah satu contoh dibawah, memanggil LevelsSeeder agar data didalamnya bisa dimasukkan dengan hanya melakukan php artisan db:seed
        $this->call(LevelsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ServicesSeeder::class);
    }
}
