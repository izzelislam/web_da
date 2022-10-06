<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\SchoolYear::factory(10)->create();

        $years = ['2020', '2021', '2022', '2023'];

        foreach($years as $val){
            SchoolYear::create([
                'year' => $val,
                'status' => 0
            ]);
        }
    }
}
