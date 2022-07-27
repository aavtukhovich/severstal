<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Test images
     */
    private $images = [
        '/assets/files/1.png',
        '/assets/files/3.jpg',
        '/assets/files/4.jpg',
        '/assets/files/5.jpg',
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(64),
            'price'   => $this->faker->randomElement([$this->faker->randomFloat(2,1,9999),null,0]),
            'currency'  => $this->faker->randomElement(['USD','EUR','RUB',null]),
            'file_path' => $this->faker->randomElement($this->images),
        ];
    }
}
