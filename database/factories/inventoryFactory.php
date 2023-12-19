<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class inventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Inventory::class;
    public function definition()
    {
        return [
            'quantity' => rand(1,10),
        ];
    }
}
