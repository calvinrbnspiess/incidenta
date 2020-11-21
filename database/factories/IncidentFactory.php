<?php

namespace Database\Factories;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Incident::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement([
            array("title" => 'Baum auf Straße', "category" => "Technische Hilfeleistung"),
            array("title" => 'Gebäudebrand', "category" => "Brandeinsatz"),
            array("title" => 'Verkehrsunfall', "category" => "Technische Hilfeleistung"),
            array("title" => 'Gasgeruch', "category" => "Gefahrstoffe"),
            array("title" => 'Brandmeldeanlage', "category" => "Brandmeldeanlage"),
        ]);

        return [
            'title' => $type["title"],
            'description' => $this->faker->realText(2400),
            'date' => $this->faker->dateTimeBetween("-3 months", "now"),
            'participants' => rand(3,26),
            'participantsPA'=> rand(0,2),
            'duration' => rand(0,3) + rand(1,3) * 0.5,
            'zipcode' => "76829",
            'city' => "Landau",
            'street' => $this->faker->streetName(),
            'category' => $type["category"]
        ];
    }


}