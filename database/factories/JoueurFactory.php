<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class JoueurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Joueur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i = 0;
        static $a = 1;
        if ($i === 10) {
            $i = 0; $a++;
        }
        
        $i++;
        return [
            
                "nom" =>$this->faker->lastName(),
                "prenom" =>$this->faker->lastName(),
                "age"=>$this->faker->numberBetween(16,38),
                "telephone"=>$this->faker->phoneNumber(),
                'email' => $this->faker->unique()->safeEmail(),
                "genre" => $this->faker->title($gender = 'male'|'female'),
                "pays" => $this->faker->country(),
                "role_id" => $this->faker->numberBetween(1, count(Role::all())),   
                "equipe_id" => $a,   
        ];
    }
}
