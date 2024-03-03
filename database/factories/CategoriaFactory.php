<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//Ese será para el slug
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /**Eejemplo de slug
         * Hola munda
         * slug: hola-mundo
         */
        $name=$this->faker->unique()->word(20);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
