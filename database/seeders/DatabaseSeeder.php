<?php
namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'  => 'Admin',
            'email' => 'admin@example.com',
        ]);

        Kategori::insert([
            [
                'nama'      => 'Elektronik',
                'deskripsi' => 'Barang barang Elektronik',
            ],
            [
                'nama'      => 'Sembako',
                'deskripsi' => 'Barang barang Sembako',
            ],
            [
                'nama'      => 'Alat tulis',
                'deskripsi' => 'Barang barang Alat tulis',
            ],
            [
                'nama'      => 'Mainan',
                'deskripsi' => 'Barang barang Mainan',
            ],
        ]);
    }
}
