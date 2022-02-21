<?php

namespace Database\Factories;

use App\Models\Tourpackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TourpackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tourpackage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=4, $asText=true);
        return [
            'name' => $name,
            'summary' => $this->faker->text(100),
            'continent' => $this->faker->numberBetween(1,20),
            'country' => $this->faker->numberBetween(1,20),
            'city' => $this->faker->numberBetween(1,20),
            'price' => $this->faker->numberBetween(10,500),
            'thumbnail' => 'digital_' . $this->faker->unique()->numberBetween(1,22) . '.jpg',
            'id_category' => $this->faker->numberBetween(1,5)
            //
        ];
    }
}
