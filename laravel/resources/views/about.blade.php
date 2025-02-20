@extends('layouts.main')

@section('content')
<div class="container py-5 text-center col-md-6 mx-auto" style="position: relative; z-index: 1; color: white; background-color: #6d6d6d50; border-radius: 10px; padding: 20px;">
    <h1 class="display-4">Chi Siamo</h1>
    <p>Benvenuti nel nostro sito! Siamo una comunità dedicata a condividere eventi organizzati a Ferrara e dintorni, grandi o piccoli che siano.</p>
    
    <h4>La Nostra Missione</h4>
    <p>La nostra missione è quella di creare nuove amicizie e far passare momenti di qualità ai nostri iscritti.</p>
    
    <h4>Il Nostro Team</h4>
    <p>Il nostro team è composto dai curatori del sito Riccardo Augusto Chira, Giuseppe Viggiano e gli admin che approvano gli eventi.</p>
    
    <h4>Contattaci</h4>
    <p>Per qualsiasi domanda o informazione, non esitare a <a href="{{ route('contact') }}" style="color:#212529">contattarci</a>.</p>
</div>
@endsection
