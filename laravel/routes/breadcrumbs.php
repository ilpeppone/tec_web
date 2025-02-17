<?php
// routes/breadcrumbs.php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('Home', route('welcome'));
});

// Home > Eventi
Breadcrumbs::for('events.index', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Eventi', route('events.index'));
});

// Home > Eventi > Dettaglio Evento
Breadcrumbs::for('events.show', function ($trail, $event) {
    $trail->parent('events.index');
    $trail->push($event->title, route('events.show', $event->id));
});

// Home > Creazione Evento
Breadcrumbs::for('events.create', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Creazione Evento', route('events.create'));
});

// Home > Search resutls
Breadcrumbs::for('events.search', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Risultati ricerca', route('events.search'));
});

// Home > Profile
Breadcrumbs::for('home', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Profilo', route('home'));
});

// Home > Contacts
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Contattaci', route('contact'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('welcome');
    $trail->push('About', route('about'));
});

// Home > Help
Breadcrumbs::for('help', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Help', route('help'));
});

// Home > Privacy
Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Politica Privacy', route('privacy'));
});

// Home > Terms
Breadcrumbs::for('terms', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Termini e Condizioni', route('terms'));
});

// Home > Profile > AdminPromote
Breadcrumbs::for('admin.promote.form', function ($trail) {
    $trail->parent('home');
    $trail->push('Diventa Admin', route('admin.promote.form'));
});

// Home > ProfileAdmin > Pending
Breadcrumbs::for('admin.pending', function ($trail) {
    $trail->parent('home');
    $trail->push('Eventi in Attesa', route('admin.pending'));
});

// Home > ProfileAdmin > EventDetail
Breadcrumbs::for('admin.events.show', function ($trail) {
    $trail->parent('home');
    $trail->push($event->title, route('admin.events.show'));
});