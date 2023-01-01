<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Customer;
use App\Models\Exhibition;
use App\Models\Ticket;
use App\Models\Reservation;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Customer::truncate();
        // Exhibition::truncate();
        // Ticket::truncate();
        // Reservation::truncate();

        User::factory(3)->create();
        Customer::factory(3)->create();
        Exhibition::factory(3)->create();
        Ticket::factory(3)->create();
        Reservation::factory(6)->create();
        

    }
}
