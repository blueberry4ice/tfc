<?php

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=3, $asText=true);
        $group = $this->faker->unique()->words($nb=2, $asText=true);
        $branch = $this->faker->unique()->words($nb=2, $asText=true);
        $created_by = $this->faker->unique()->words($nb=1, $asText=true);
        return [
            'name' => $name,
            'code' => $this->faker->numberBetween(100000,500000),
            'group' => $group,
            'branch' => $branch,
            'thumbnail' => 'digital_' . $this->faker->numberBetween(1,22) . '.jpg',
            'url' => $this->faker->text(20),
            'created_by' => $created_by,
            'updated_by' => $created_by
            //
        ];
    }
}
