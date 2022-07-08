<?php

namespace Database\Seeders;

use App\Models\Jam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jam::create([
            'waktu' => '07:00'
        ]);
        Jam::create([
            'waktu' => '08:00'
        ]);
        Jam::create([
            'waktu' => '09:00'
        ]);
        Jam::create([
            'waktu' => '10:00'
        ]);
        Jam::create([
            'waktu' => '11:00'
        ]);
        Jam::create([
            'waktu' => '12:00'
        ]);
        Jam::create([
            'waktu' => '13:00'
        ]);
        Jam::create([
            'waktu' => '14:00'
        ]);
        Jam::create([
            'waktu' => '15:00'
        ]);
        Jam::create([
            'waktu' => '16:00'
        ]);
        Jam::create([
            'waktu' => '17:00'
        ]);
        Jam::create([
            'waktu' => '18:00'
        ]);

        Jam::create([
            'waktu' => '19:00'
        ]);
        Jam::create([
            'waktu' => '20:00'
        ]);
    }
}
