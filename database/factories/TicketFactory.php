<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exhibition;
use App\Models\Ticket;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(300, 1700),
            'ticket_comment' => $this->faker->boolean ? $this->faker->sentence(3) : null,
            'exhibition_id' => Exhibition::all()->random()->id
        ];
    }
}
