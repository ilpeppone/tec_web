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
        $user = User::firstOrCreate(
            ['email' => 'example@example.com'],
            [
                'name' => 'Example User',
                'password' => bcrypt('password'),
            ]
        );

        // Modificare una tupla specifica
        Event::updateOrCreate(
            ['title' => 'Titolo dell\'evento'], // Condizione per trovare il record esistente
            [
                'user_id' => $user->id,
                'title' => 'Titolo dell\'evento',
                'description' => 'Descrizione dell\'evento',
                'image_path' => null, // Impostare image_path a NULL
                'is_outdoor' => 0,
                'event_date' => '2025-04-24',
                'max_participants' => 32,
                'address' => 'Rotonda Costantini 7, Naomi a mare, 06819 Siracusa (SS)',
                'price' => 10.00, // Aggiungi il prezzo qui
            ]
        );

        // Generare gli altri record automaticamente
        Event::factory()->count(50)->create();
    }
}
