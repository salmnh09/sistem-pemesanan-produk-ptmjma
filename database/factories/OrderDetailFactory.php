<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\IdOrder;
use App\Models\IdProduk;
use App\Models\order_detail;

class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_order' => IdOrder::factory(),
            'id_produk' => IdProduk::factory(),
            'jumlah' => fake()->word(),
            'harga' => fake()->word(),
        ];
    }
}
