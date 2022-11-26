<?php

namespace Database\Seeders;

use App\Models\Kategori;
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
        Kategori::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        Kategori::create([
            'name' => 'Event',
            'slug' => 'event'
        ]);

        Kategori::create([
            'name' => 'Pelatihan',
            'slug' => 'pelatihan'
        ]);
    }
}
