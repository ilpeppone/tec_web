<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
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
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image_path' => $this->faker->imageUrl(640, 480, 'events', true),
            'is_outdoor' => $this->faker->boolean,
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'max_participants' => $this->faker->numberBetween(10, 100),
            'address' => $this->faker->address,
        ];
    }
}
