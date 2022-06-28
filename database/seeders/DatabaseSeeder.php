<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Bidang::create([
            'nama_bidang' => 'Informatika'
        ]);
        Bidang::create([
            'nama_bidang' => 'SST'
        ]);
        Bidang::create([
            'nama_bidang' => 'Humas'
        ]);

        Bidang::create([
            'nama_bidang' => 'Kesekretariatan'
        ]);
        Ruangan::create([
            'nama_ruangan' => 'Informatika',
            'id_bidang' => 1
        ]);
        Ruangan::create([
            'nama_ruangan' => 'SST',
            'id_bidang' => 2
        ]);
        Ruangan::create([
            'nama_ruangan' => 'Humas',
            'id_bidang' => 3
        ]);
        Ruangan::create([
            'nama_ruangan' => 'Kesekretariatan',
            'id_bidang' => 4
        ]);

        \App\Models\User::factory(5)->create();
        // \App\Models\inventaris::factory(5)->create();
        // \App\Models\inventaris::factory(5)->create();
    }
}
