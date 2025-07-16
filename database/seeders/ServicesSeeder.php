<?php

namespace Database\Seeders;

use App\Models\TypeOfServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfServices::insert(
            [
                [
                    'service_name' => 'Cuci dan Setrika',
                    'price' => 5000,
                    'description' => 'Layanan cuci dan setrika pakaian.'
                ],
                [
                    'service_name' => 'Cuci Saja',
                    'price' => 4500,
                    'description' => 'Layanan cuci pakaian tanpa setrika.'
                ],
                [
                    'service_name' => 'Setrika Saja',
                    'price' => 5000,
                    'description' => 'Layanan setrika pakaian tanpa cuci.'
                ],
                [
                    'service_name' => 'Laundry Besar',
                    'price' => 7000,
                    'description' => 'Layanan laundry untuk barang-barang besar seperti selimut, sprei, dan gorden, mantel.'
                ],
            ]
        );
    }
}
