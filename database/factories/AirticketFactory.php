<?php

namespace Database\Factories;

use App\Models\Airticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AirticketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=2,$asText=true);
        $origin = $this->faker->unique()->words($nb=1,$asText=true);
        $created_by = $this->faker->unique()->words($nb=1, $asText=true);
        return [
            'sku' => $this->faker->unique()->numberBetween(1,99),
            'name' => $name,
            'summary' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(100000,1000000),
            'origin' => $origin,
            'destination' => $this->faker->words($nb=1,$asText=true),
            'continent' => $this->faker->words($nb=1,$asText=true),
            'country' => $this->faker->words($nb=1,$asText=true),
            'city' => $this->faker->unique()->words($nb=1,$asText=true),
            'id_airlines' => $this->faker->numberBetween(1,7),
            'id_category' => $this->faker->numberBetween(1,7),
            'thumbnail' => 'digital_' . $this->faker->numberBetween(1,22) . '.jpg',
            'created_by' => $created_by,
            'updated_by' => $created_by
        ];
    }
}
