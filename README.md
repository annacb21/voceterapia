# Voceterapia

Sito statico realizzato con HTML, CSS e JavaScript vanilla.

## Struttura

- **Pagine principali**: `index.html`, `formazione.html`, `voceterapia.html`, `canto.html`, `recensioni.html`, `contatti.html`.
- **Partials riutilizzabili**: `partials/navbar.html`, `partials/footer.html`, caricati lato client tramite `js/partials.js`.
- **Dati**: le recensioni sono definite in `data/reviews.json` e popolate in pagina dai file `js/reviews-home.js` e `js/reviews-carousel.js`.
- **Asset**: foglio di stile unico `styles.css`, immagini nella cartella `images/`, script vari in `js/`.

## Avvio locale

I partials e i dati sono caricati via `fetch`, perciò è necessario servire il progetto tramite un web server locale (l'apertura diretta dei file con `file://` blocca le richieste).

Esempio con Python 3:

```bash
cd /Users/nicola/Development/projects/voceterapia
python3 -m http.server 8000
```

Poi apri [http://localhost:8000](http://localhost:8000) nel browser.

## Deploy

Carica l'intera cartella su un qualsiasi hosting statico (GitHub Pages, Netlify, Vercel, ecc.). Assicurati che la root del sito contenga i file `.html` e che le cartelle `partials/` e `data/` siano raggiungibili con lo stesso percorso relativo.
