<?php

namespace Database\Seeders;

use App\Models\Incident;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
    /**
     * Create Incidents and assign random vehicles
     *
     * @return void
     */
    public function run()
    {
        Incident::factory()->times(25)->create()->each(function($incident) {
            $vehicles = Vehicle::inRandomOrder()->limit(rand(0, 5))->get();

            $incident->vehicles()->saveMany($vehicles);
        });
    }
}
