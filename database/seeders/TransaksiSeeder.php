<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaksi::create([
            'user_id' => 1,
            'jenis_cucian' => 'Cucian Basah',
            'tanggal_masuk' => Carbon::create('2022', '06', '07'),
            'tanggal-keluar' => Carbon::create('2022', '06', '10'),
            'berat-cucian' => '20Kg'
        ]);
    }
}
