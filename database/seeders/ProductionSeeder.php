<?php

namespace Database\Seeders;

use App\Models\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 100) as $i) {
            Production::create([
                'date' => \Carbon\Carbon::parse('2025-06-01')->addDays($i - 1),
                'shift' => 'Shift ' . 1,
                'workcenter_id' => 'WC' . str_pad(rand(1, 15) + 1, 2, '0', STR_PAD_LEFT),
                'lot_id' => 'LOT' . str_pad(rand(1, 100) + 1, 2, '0', STR_PAD_LEFT),
                'qty_output' => rand(20, 150),
                'operator_id' => 'EMP00' . rand(3, 100),
                'note' => 'Production note ' . $i,
            ]);
            Production::create([
                'date' => \Carbon\Carbon::parse('2025-06-01')->addDays($i - 1),
                'shift' => 'Shift ' . 2,
                'workcenter_id' => 'WC' . str_pad(rand(1, 15) + 1, 2, '0', STR_PAD_LEFT),
                'lot_id' => 'LOT' . str_pad(rand(1, 100) + 1, 2, '0', STR_PAD_LEFT),
                'qty_output' => rand(20, 150),
                'operator_id' => 'EMP00' . rand(3, 100),
                'note' => 'Production note ' . $i,
            ]);
            Production::create([
                'date' => \Carbon\Carbon::parse('2025-06-01')->addDays($i - 1),
                'shift' => 'Shift ' . 3,
                'workcenter_id' => 'WC' . str_pad(rand(1, 15) + 1, 2, '0', STR_PAD_LEFT),
                'lot_id' => 'LOT' . str_pad(rand(1, 100) + 1, 2, '0', STR_PAD_LEFT),
                'qty_output' => rand(20, 150),
                'operator_id' => 'EMP00' . rand(3, 100),
                'note' => 'Production note ' . $i,
            ]);
        }
    }
}
