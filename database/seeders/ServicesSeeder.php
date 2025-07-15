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
                    'service_name' => 'Cuci Kering',
                    'price' => 5000,
                    'description' => 'Layanan cuci, kering, dan setrika pakaian.'
                ],
                [
                    'service_name' => 'Cuci Setrika',
                    'price' => 7000,
                    'description' => 'Layanan cuci dan setrika pakaian.'
                ],
                [
                    'service_name' => 'Setrika Saja',
                    'price' => 3000,
                    'description' => 'Layanan setrika pakaian tanpa cuci.'
                ],
                [
                    'service_name' => 'Dry Clean',
                    'price' => 15000,
                    'description' => 'Layanan dry clean untuk pakaian yang memerlukan perawatan khusus.'
                ],
            ]
        );
    }
}
