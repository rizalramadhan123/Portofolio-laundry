<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\datapelanggan;
use App\Models\datadetergen;
use App\Models\hargakiloan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        User::create([
            'name'=>'rizal ramadhan',
            'email'=> 'izalr909@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => 1
        ]);

        datadetergen::create([
            'nama_detergen' => 'jazz 1',
            'harga_detergen' => 1000
        ]);
        
        datadetergen::create([
            'nama_detergen' => 'rinso molto',
            'harga_detergen' => 3000
        ]);

        datadetergen::create([
            'nama_detergen' => 'daia',
            'harga_detergen' => 2000
        ]);

        datapelanggan::create([
            'nama_pelanggan' => 'bambang',
            'no_telp' => '0821783434',
            'berat_barang' => 3,
            'hargaperkilo' => 10000,
            'total' => 31000,
            'uang' => 50000,
            'kembalian' => 19000,
            'id_user' => 1,
            'id_detergen' => 1,
            'statuscucian' => 1,
            'statusbayar' => 0,
            'statusambil' => 0,
        ]);

        datapelanggan::create([
            'nama_pelanggan' => 'rizal',
            'no_telp' => '0821783434',
            'berat_barang' => 3,
            'hargaperkilo' => 10000,
            'total' => 31000,
            'uang' => 50000,
            'kembalian' => 19000,
            'id_user' => 1,
            'id_detergen' => 1,
            'statuscucian' => 1,
            'statusbayar' => 0,
            'statusambil' => 0,
        ]);

        datapelanggan::create([
            'nama_pelanggan' => 'dea',
            'no_telp' => '0821783434',
            'berat_barang' => 3,
            'hargaperkilo' => 10000,
            'total' => 31000,
            'uang' => 50000,
            'kembalian' => 19000,
            'id_user' => 1,
            'id_detergen' => 1,
            'statuscucian' => 1,
            'statusbayar' => 0,
            'statusambil' => 0,
        ]);

        hargakiloan::create([
            'harga'=> 10000
        ]);

    
    }
}
