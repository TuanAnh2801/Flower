<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->word()),
            'desc' => $this->faker->sentence(2, true),
            'img' => [$this->faker->imageUrl($width = 253, $height = 347)],
            'category_id' => rand(1,3),
            'inventory_id' => rand(1,10),
            'price' =>rand(1,10)
        ];
    }
}
