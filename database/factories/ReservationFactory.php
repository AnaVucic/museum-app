<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'ticket_id' => Ticket::all()->random()->id,
            'reservation_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'user_id' => User::all()->random()->id,
            'customer_id' => Customer::all()->random()->id
        ];
    }
}
