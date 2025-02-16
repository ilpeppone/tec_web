<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creare un utente
        User::factory()->count(10)->create();
        // Generare gli altri record automaticamente
        Event::factory()->count(50)->create();
    }
}
