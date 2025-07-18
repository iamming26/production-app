<?php

namespace Database\Seeders;

use App\Models\Lot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lot::truncate();
        for ($i = 0; $i < 100; $i++) {
            $qty = rand(750, 1500);
            Lot::create([
                'lot_id' => 'LOT' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'qty' => $qty,
                'qty_remaining' => $qty,
            ]);
        }
    }
}
