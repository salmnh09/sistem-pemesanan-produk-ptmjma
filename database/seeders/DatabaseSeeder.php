<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Kategori::factory()->create(['nama_kategori' => 'Elektronik']);
        \App\Models\Kategori::factory()->create(['nama_kategori' => 'Fashion']);
        \App\Models\Kategori::factory()->create(['nama_kategori' => 'Olahraga']);

        \App\Models\Produk::factory()->create(['kategori_id' => 1, 'nama_produk' => 'Laptop', 'deskripsi' => 'Laptop untuk gaming', 'harga' => 10000000, 'stok' => 10, 'gambar' => 'laptop.jpg']);
        \App\Models\Produk::factory()->create(['kategori_id' => 1, 'nama_produk' => 'Smartphone', 'deskripsi' => 'Smartphone 5G', 'harga' => 5000000, 'stok' => 20, 'gambar' => 'smartphone.jpg']);
        \App\Models\Produk::factory()->create(['kategori_id' => 2, 'nama_produk' => 'Jam Tangan', 'deskripsi' => 'Jam tangan untuk pria', 'harga' => 2000000, 'stok' => 5, 'gambar' => 'jam-tangan.jpg']);
        \App\Models\Produk::factory()->create(['kategori_id' => 3, 'nama_produk' => 'Sepatu Olahraga', 'deskripsi' => 'Sepatu olahraga untuk lari', 'harga' => 3000000, 'stok' => 8, 'gambar' => 'sepatu-olahraga.jpg']);
    }
}
