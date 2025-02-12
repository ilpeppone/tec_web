@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Chi Siamo</h1>
    <p>Benvenuti nel nostro sito! Siamo una comunità dedicata a [descrizione del sito].</p>
    
    <h2>La Nostra Missione</h2>
    <p>La nostra missione è [descrizione della missione].</p>
    
    <h2>Il Nostro Team</h2>
    <p>Il nostro team è composto da [descrizione del team].</p>
    
    <h2>Contattaci</h2>
    <p>Per qualsiasi domanda o informazione, non esitare a <a href="{{ route('contact') }}">contattarci</a>.</p>
</div>
@endsection
