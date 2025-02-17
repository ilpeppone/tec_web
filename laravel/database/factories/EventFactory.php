<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

        // Crea un percorso di immagine di default
        $randomImage = 'events/default.jpg'; // esempio di immagine


        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->realText(20),
            'description' => $this->faker->realText(400),
            'image_path' => $randomImage, // Utilizza l'immagine di default
            'is_outdoor' => $this->faker->boolean,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'max_participants' => $this->faker->numberBetween(10, 100),
            'address' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 0, 10),
            'approved' => $this->faker->boolean(90),
        ];
    }
}
