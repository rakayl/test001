<?php

namespace Database\Seeders;

use App\Models\KategoriMesin;
use Illuminate\Database\Seeder;

class KategoriMesinSeeder extends Seeder
{
    use SeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('kategori_mesins');

        KategoriMesin::create([
            'nama_kategori' => 'Mesin 1',
            'kode_kategori' => 'Kode 1',
        ]);

        KategoriMesin::create([
            'nama_kategori' => 'Mesin 2',
            'kode_kategori' => 'Kode 2',
        ]);

        KategoriMesin::create([
            'nama_kategori' => 'Mesin 3',
            'kode_kategori' => 'Kode 3',
        ]);

        KategoriMesin::create([
            'nama_kategori' => 'Mesin 4',
            'kode_kategori' => 'Kode 4',
        ]);
        KategoriMesin::create([
            'nama_kategori' => 'Mesin 5',
            'kode_kategori' => 'Kode 5',
        ]);
        KategoriMesin::create([
            'nama_kategori' => 'Mesin 6',
            'kode_kategori' => 'Kode 6',
        ]);
    }
}
