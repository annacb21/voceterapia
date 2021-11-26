<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Formazione | Voceterapia</title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content="voceterpia, insegnate di voceterapia, elisa fortunati, verona, lezioni di canto, insegnante di canto, canto, logopedista, terapista, recitazione, dizione, riabilitazione, rieducazione, psicologa, balbuzie, tecnica vocale, postura, benessere, rilassamento, anti stress"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- MAIN CONTENT -->
    <div class="row">
        <div class="col-lg-7">
            <div class="row">
                <div>
                    <h1>Formazione</h1>
                </div>
                <div>
                    <p>Dopo il conseguimento del Diploma di Canto con 10 e lode, ho conseguito la laurea in Filosofia con 110 e lode.
                    Ho pubblicato un articolo relativo alla tesi di laurea “Sul Compendium musicae” di Cartesio nella Rivista Musicologica “Quaderni di musicologia” ed ho vinto il concorso come Coordinatore dei Servizi Musicali della Fondazione Arena.
                    Ho Iniziato la carriera della solista 20 anni fa affiancando l’attività artistica a quella didattica.
                    Appassionata da sempre di canto e voce, ho seguito corsi con i migliori maestri ed esperti della tecnica vocale, con particolare attenzione alle seguenti problematiche: respirazione, postura, collegamento del fiato col suono, ginnastica facciale, ortoepia, articolazione sillabica, ginnastica facciale e dizione.
                    Ho tenuto quindi corsi di canto, respirazione e percezione corporea ed, in stretta collaborazione con psicologi e specialisti di disturbi infantili e adolescenziali, ho effettuato con successo attività di supporto a problemi di balbuzie e/o difficoltà emotiva, utilizzando la musica, tecniche di respirazione e vocali.
                    Mi sono anche dedicata all’impostazione, rieducazione vocale e respiratoria, di adulti ed adolescenti con problematiche nel meccanismo pneumofonico e conseguenti difficoltà di comunicazione.
                    Ho tenuto corsi di impostazione vocale e canto (lirico e leggero) in scuole private, per studenti del Conservatorio e corsi di musica nella scuola pubblica sia come esperta esterna che come docente interna. 
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <img src="images/pripia11.jpg" alt="foto elisa fortunati">
        </div>
    </div>
    <div class="row">
    <div class="col-lg-4">
            <img src="images/pripia9.jpg" alt="foto elisa fortunati">
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div>
                    <h2>Curriculum Vitae</h2>
                </div>
                <div>
                    <p>Ho cantato per la Fondazione Arena di Verona in Rigoletto di Verdi al Teatro Filarmonico e in Didone ed Enea di Purcell al Teatro Ristori. Per il Maggio Musicale Fiorentino ho lavorato nei due allestimenti di Die Frau ohne Schatten e Der Rosenkavalier di Strauss, entrambi diretti da Zubin Mehta.  In diversi teatri di tradizione mi sono  esibita in importanti titoli del mio repertorio (Suor Angelica di Puccini, La traviata di Verdi, I quatro rusteghi di Wolf-Ferrari, ecc..).
                    Ho vinto,  con menzione d’onore, il concorso Rome Festival per il ruolo di Hänsel in Hänsel und Gretel di Humperdinck, prima classificata al Tirindelli, Concorso Internazionale della Romanza da salotto (contestualmente premiata anche nella sezione romanze celebri).
                    Sono stata protagonista della prima assoluta di Antinesca (nel ruolo del titolo) in collaborazione con la Biennale di Venezia, nella prima italiana de La regina delle nevi al Teatro Sociale di Vicenza e nella prima esecuzione in tempi moderni di Adelaide di Borgogna al Sociale di Rovigo.
                    Come concertista ho al mio attivo numerosi concerti di musica da camera con  diverse formazioni musicali; mi sono inoltre dedicata anche al repertorio sacro (in collaborazione con l’Accademia Filarmonica ho eseguito il Requiem di Mozart, Lauda Sion di Mendelssohn, Stabat Mater di Rossini).
                    </p>
                </div>
                <div>
                    <a href="http://www.elisafortunati.it/home.html" role="button" class="btn more-btn" aria-label="sito personale">Sito personale <span><i class="fas fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
</body>
</html>