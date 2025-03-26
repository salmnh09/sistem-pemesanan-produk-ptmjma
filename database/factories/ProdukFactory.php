<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kategori;
use App\Models\Produk;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produk::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'kategori_id' => Kategori::factory(),
            'nama_produk' => fake()->word(),
            'deskripsi' => fake()->text(),
            'harga' => fake()->numberBetween(-10000, 10000),
            'stok' => fake()->numberBetween(-10000, 10000),
            'gambar' => fake()->word(),
        ];
    }
}
