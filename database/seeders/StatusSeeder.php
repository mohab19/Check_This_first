<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name'     => 'Created',
            ],
            [
                'name'     => 'Placed',
            ],
            [
                'name'     => 'Confirmed',
            ],
            [
                'name'     => 'Shipped',
            ],
            [
                'name'     => 'Delivered',
            ]
        ]);
    }
}
