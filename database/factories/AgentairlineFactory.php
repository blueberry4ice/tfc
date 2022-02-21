<?php

namespace Database\Factories;

use App\Models\Agentairline;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentairlineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agentairline::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created_by = $this->faker->unique()->words($nb=1, $asText=true);

        return [
            'id_agent' => $this->faker->numberBetween(1,20),
            'id_airline' => $this->faker->numberBetween(1,7),
            'active' => '1',
            'created_by' => $created_by,
            'updated_by' => $created_by

            //
        ];
    }
}
