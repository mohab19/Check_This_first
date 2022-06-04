<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name'     => 'Egypt',
                'code'     => 'EG',
                'currency' => 'EGP',
            ],
            [
                'name'     => 'Saudia Arabia',
                'code'     => 'SA',
                'currency' => 'SAR',
            ],
            [
                'name'     => 'United Arab Emirates',
                'code'     => 'AE',
                'currency' => 'AED',
            ]
        ]);
    }
}
