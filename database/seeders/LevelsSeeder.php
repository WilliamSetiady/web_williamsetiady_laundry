<?php

namespace Database\Seeders;

use App\Models\Levels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Levels::insert(
            [
                ['name' => 'Administrator'],
                ['name' => 'Operator'],
                ['name' => 'Leader']
            ]
        );
    }
}
