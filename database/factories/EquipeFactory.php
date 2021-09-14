<?php

namespace Database\Factories;

use App\Models\Continent;
use App\Models\Equipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" =>$this->faker->lastName(),
                "ville" =>$this->faker->city(),
                "pays"=>$this->faker->country(),
                "nombre" => $this->faker->numberBetween( 11 , 14),
                "continent_id" => $this->faker->numberBetween(1, count(Continent::all())),
        ];
    }
}
