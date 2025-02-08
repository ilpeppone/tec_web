@extends('layouts.app')

{{-- Imposta il titolo della pagina --}}
@section('title', 'Welcome')

{{-- Sezione per eventuali script o stili specifici della pagina --}}
@section('head')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection

{{-- Contenuto principale della pagina --}}
@section('content')
    <header class="py-4">
        
        <div class="container mt-4">
            <h2 style="color:#D29558">Gestione Tornei per Videogiochi</h2>
            <p>
                La nostra web app è progettata per semplificare l'organizzazione e la gestione di tornei per videogiochi, offrendo un'esperienza completa sia per gli organizzatori che per i partecipanti. Con un'interfaccia intuitiva e strumenti avanzati per la creazione e il monitoraggio dei tornei, rendiamo facile e divertente gestire competizioni online di qualsiasi tipo e dimensione.
            </p>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h5>Creazione Tornei Personalizzati</h5>
                    <p>
                        Crea tornei con formati diversi, impostazioni personalizzabili e modalità di gioco adatte a ogni esigenza. Gestisci facilmente la struttura del torneo, dall'iscrizione alla premiazione.
                    </p>
                </div>
                <div class="col-md-6">
                    <h5>Monitoraggio e Risultati in Tempo Reale</h5>
                    <p>
                        Tieni traccia dell'andamento delle partite e aggiorna i risultati in tempo reale. I partecipanti possono seguire facilmente il progresso del torneo e rimanere sempre informati.
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h5>Gestione Partecipanti</h5>
                    <p>
                        Aggiungi, gestisci e monitora i partecipanti in modo semplice. I giocatori possono iscriversi ai tornei e visualizzare il proprio stato in qualsiasi momento.
                    </p>
                </div>
                <div class="col-md-6">
                    <h5>Classifiche e Premi</h5>
                    <p>
                        Visualizza le classifiche in tempo reale e assegna premi ai vincitori. Tieni traccia dei risultati e premia i partecipanti con un sistema di premi personalizzato.
                    </p>
                </div>
                
            </div>
        </div>
        
            
        </div>
    </header>
@endsection
