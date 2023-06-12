<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = faker::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        return [
            'name' => $faker->vehicle(),
            'description' => $faker->vehicleBrand() . ' ' . $faker->vehicleType() . ' ' . $faker->vehicleGearBoxType(),
            'price' => $faker->numberBetween(10000, 100000),
            'picture' => $faker->image(public_path('storage/images'), 200, 200, ['car'], false),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
