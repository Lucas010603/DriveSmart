<?php

namespace Database\Factories\Instructor;

use App\Models\Instructor\Car;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // generates fake cars
    public function definition(): array
    {
        $faker = Faker::create('nl_NL');
        $faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $car = $faker->vehicleArray();
        $fuelTypes = ["benziene", "electrish", "diesel"];
        return [
            'plate' => $this->faker->unique()->regexify('[A-Z]{2}-[A-Z]{2}-[0-9]{1}-[A-Z]{2}-[0-9]{1}'),
            'brand' => $car['brand'],
            'model' => $car['model'],
            'fuel' => $fuelTypes[rand(0, 2)],
            'cruise_control' => $faker->boolean
        ];
    }
}
