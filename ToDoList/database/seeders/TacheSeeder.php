<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tache;

class TacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Tache::factory()->count(10)->create();
    }
}