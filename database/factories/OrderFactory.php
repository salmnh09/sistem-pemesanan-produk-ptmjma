<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\order;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id_order' => fake()->word(),
            'total_jumlah' => fake()->word(),
            'total_harga' => fake()->word(),
        ];
    }
}
