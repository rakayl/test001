<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    use SeederTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('workshops');

        Workshop::create([
            'nama_workshop' => 'Workshop 1',
        ]);

        Workshop::create([
            'nama_workshop' => 'Workshop 2',
        ]);

        Workshop::create([
            'nama_workshop' => 'Workshop 3',
        ]);

        Workshop::create([
            'nama_workshop' => 'Workshop 4',
        ]);
    }
}
