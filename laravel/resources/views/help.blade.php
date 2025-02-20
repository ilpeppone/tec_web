@extends('layouts.main')

@section('title', 'E-vents - Guida')

@section('content')
<div class="container py-5 text-center col-md-6 mx-auto" style="position: relative; z-index: 1; color: white; background-color: #6d6d6d50; border-radius: 10px; padding: 20px;">
        <h1 class="display-4">Guida all'uso di E-vents</h1>
        
            <div class="mb-5">
                <h4>Registrazione</h4>
                <p>Per usufruire di tutte le funzionalità del sito, è necessario registrarsi. Puoi farlo cliccando sul pulsante "Registrati" in alto a destra e compilando il modulo di registrazione con i tuoi dati.</p>
            </div>

            <div class="mb-5">
                <h4>Organizzatori di Eventi</h4>
                <p>Se sei un organizzatore di eventi, dopo aver effettuato l'accesso, puoi caricare i tuoi eventi cliccando su "Crea un nuovo Evento" nella pagina principale. Compila il modulo con tutte le informazioni necessarie e pubblica il tuo evento.</p>
            </div>

            <div class="mb-5">
                <h4>Partecipanti</h4>
                <p>Se sei un utente che vuole partecipare agli eventi, puoi iscriverti agli eventi di tuo interesse. Cerca gli eventi nella pagina principale e clicca su "Scopri di più" per vedere i dettagli dell'evento e iscriverti.</p>
            </div>

            <div class="mb-5">
                <h4>Amministratori</h4>
                <p>Se sei un amministratore, hai il compito di approvare o rifiutare gli eventi caricati dagli organizzatori. Puoi gestire gli eventi dalla tua dashboard amministrativa, dove troverai l'elenco degli eventi in attesa di approvazione.</p>
            </div>  
</div>
@endsection
