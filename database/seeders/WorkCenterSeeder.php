<?php

namespace Database\Seeders;

use App\Models\WorkCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkCenter::truncate(); // Bersihkan dulu jika perlu


        for ($i=0; $i < 15; $i++) { 
            WorkCenter::create([
                'code' => 'WC' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'name' => 'Work Center ' . ($i + 1),
                'desc' => 'Description for Work Center ' . ($i + 1),
            ]);
        }
    }
}
