<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            'Mts', 'Mualimat', 'Tahfidz', 'i dad'
        ];

        foreach ($units as $key => $value) {
            Unit::create([
                'name' => $value
            ]);
        }
    }
}
