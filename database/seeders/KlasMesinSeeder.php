<?php

namespace Database\Seeders;

use App\Models\KlasMesin;
use Illuminate\Database\Seeder;

class KlasMesinSeeder extends Seeder
{
    use SeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('klasmesins');

        KlasMesin::create([
            'kategorimesin_id' => 1,
            'kode_klasifikasi' => 'FD',
            'nama_klasifikasi' => 'FD 1',
        ]);

        KlasMesin::create([
            'kategorimesin_id' => 2,
            'kode_klasifikasi' => 'FG',
            'nama_klasifikasi' => 'FG 2',
        ]);

        KlasMesin::create([
            'kategorimesin_id' => 3,
            'kode_klasifikasi' => 'FI',
            'nama_klasifikasi' => 'FI 3',
        ]);

        KlasMesin::create([
            'kategorimesin_id' => 4,
            'kode_klasifikasi' => 'DC',
            'nama_klasifikasi' => 'DC 4',
        ]);
        KlasMesin::create([
            'kategorimesin_id' => 5,
            'kode_klasifikasi' => 'DG',
            'nama_klasifikasi' => 'DG 5',
        ]);
        KlasMesin::create([
            'kategorimesin_id' => 6,
            'kode_klasifikasi' => 'DD',
            'nama_klasifikasi' => 'DD 6',
        ]);
    }
}
