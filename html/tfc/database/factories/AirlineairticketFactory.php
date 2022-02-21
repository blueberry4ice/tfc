<?php

namespace Database\Factories;

use App\Models\Airlineairticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirlineairticketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airlineairticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_by = $this->faker->unique()->words($nb=1, $asText=true);

        return [
            'id_airline' => $this->faker->numberBetween(1,7),
            'id_airticket' => $this->faker->numberBetween(1,50),
            'active' => '1',
            'created_by' => $created_by,
            'updated_by' => $created_by

            //
        ];
    }
}
