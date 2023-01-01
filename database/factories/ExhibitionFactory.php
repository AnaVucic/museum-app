<?php

namespace Database\Factories;

use App\Models\Exhibition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibition>
 */
class ExhibitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Exhibition::class;
     
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->sentence(4),
            'address' => $this->faker->streetAddress(),
            'description' => $this->faker->unique()->sentence(10)
        ];
    }
}
