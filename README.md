# Sito Web per esame di tecnologie web
### Presentazione

Breve presentazione del progetto: 
[Apri il PDF](E-vents.pdf)
## Passaggi per provare il sito web in localhost:

 1. Cloniamo il repository.
 2. Avviamo mysql e creiamo il database Events.
 3. Entriamo nella cartella clonata e poi entriamo nella cartella laravel.
 4. Eseguiamo composer install.
 5. Nel file .env.exeample elimininamo la parte .example ottenendo .env
 6. Per ottenere la password che andremo ad inserire tutta attaccata nel campo MAIL_PASSWORD accediamo a https://myaccount.google.com/ , cerchiamo nella barra di ricerca “password per le app” e ne creiamo una.
 7. Nel file .env ottenuto modifichiamo le parti commentate con i nostri dati (sia per database che per servizio di verifica email e recupero password).
 8. Eseguiamo la migrazione con php artisan:migrate per creare le tabelle nel database al quale abbiamo associato il nostro sito.
 9. Lo riempiamo di esempi con le factory col comando: php -d memory_limit=512M artisan db:seed.
 10. Per mandare in esecuzione su localhost lanciamo il comando php artisan serve.
 11. Inseriamo l'url 127.0.0.1:8000 oppure localhost:8000 .
 12. Creiamo un nuovo account registrandoci.
 13. Confermiamo l’email che ci arriverà sulla nostra email usata durante la creazione dell’account.
 14. Per provare le funzionalità da admin che permette di approvare gli eventi, nel menù a tendina del profilo in altro a destra clicchiamo e cerchiamo la voce diventa admin e inseriamo il codice “SECRET_ADMIN_CODE” senza virgolette e tutto in maiuscolo.



