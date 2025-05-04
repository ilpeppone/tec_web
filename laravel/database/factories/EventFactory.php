<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class EventFactory extends Factory
{
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker = \Faker\Factory::create('it_IT');

        // array di immagini predefinite
        $defaultImages = [
            'default.jpg',
            'default2.jpg',
            'default3.jpg',
            'default4.jpg',
            'default5.jpg',
            'default6.jpg',
        ];

        // seleziona un'immagine casualmente
        $randomImage = Arr::random($defaultImages);

        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->realText(10),
            'description' => $this->faker->realText(20),
            'image_path' => 'images/events/' . $randomImage,
            'is_outdoor' => $this->faker->boolean,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'max_participants' => $this->faker->numberBetween(10, 100),
            'address' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 0, 10),
            'approved' => $this->faker->boolean(90),
        ];
    }
}
