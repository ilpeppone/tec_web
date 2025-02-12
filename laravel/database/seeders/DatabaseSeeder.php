<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crea 50 eventi di esempio
        Event::factory()->count(50)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
