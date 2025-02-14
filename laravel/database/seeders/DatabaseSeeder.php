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

        // Crea 10 utenti di esempio con email uniche
        User::factory()->count(10)->create();

        // Verifica se l'utente esiste già prima di crearlo
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Assicurati di usare bcrypt per la password
            ]
        );
    }
}
