<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $type = $this->faker->randomElement([array("name" => 'Löschgruppenfahrzeug', "identification" => "44"), array("name" => 'Tanklöschfahrzeug', "identification" => "23"), array("name" => 'Rüstwagen', "identification" => "52")]);

        return [
            'name' => $type["name"],
            'radioIdentificationPrefix' => "Florian Landau",
            'radioIdentification' => "1-".$type["identification"]."-".rand(1,4), 
        ];
    }
}