<?php 
require_once("resources/config.php"); 
$query = query("SELECT * FROM recensioni ORDER BY data_rec DESC LIMIT 3");
confirm($query);
$recensioni = array();
$i = 0;
while($row = fetch_array($query)) {
    $d = date_create($row['data_rec']);
    $pdate = date_format($d, 'd/m/y');
    $recensioni[$i] = new Recensione($row['id'], $row['autore'], $row['foto_autore'], $row['titolo'], $row['testo'], $row['punteggio'], $pdate);
    $i++;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Voceterapia</title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content="voceterpia, insegnate di voceterapia, elisa fortunati, verona, lezioni di canto, insegnante di canto, canto, logopedista, terapista, recitazione, dizione, riabilitazione, rieducazione, psicologa, balbuzie, tecnica vocale, postura, benessere, rilassamento, anti stress"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- HEADER -->
    <div id="Header" class="content-padding">
        <div class="row align-items-center pb-3">
            <div class="col-lg-6">
                <p class="header-subtitle">Elisa Fortunati</p>
                <p class="header-small">Insegnante di</p>
                <h1>Voceterapia</h1>
            </div>
            <div class="col-lg-6">
                <img src="images/elisa1.png" alt="foto elisa fortunati">
            </div>
        </div>
    </div>

    <!-- VOCETERAPIA -->
    <div class="py-5 background-light">
        <div class="content-padding text-center">
            <h2 class="pb-4">Cos'è la voceterapia?</h2>
            <p class="pb-4">La voce è lo strumento più naturale che esista. </br>
            Ciascuno di noi nasce con questa “dotazione”, personalissima ed unica, che lo rende per questo speciale e irripetibile. </br>
            Ciascuna voce è, però, non solo legata alle nostre caratteristiche fisiche e morfologiche  ma anche alla storia soggettiva, ai vissuti, che fanno parte di noi e che, in qualche modo,  anche il nostro strumento vocale racconta.
            Lavorando quindi sul nostro principale e immediato mezzo di comunicazione, si entra in un campo di analisi che è anche “altro” rispetto a quello semplicemente canoro o verbale, in virtù di questa connessione inedita tra voce e anima, tra parola e inconscio.
            Il corpo, attraverso la voce, parla la lingua delle emozioni.
            Il mio ruolo è aiutarti a capire meglio come farla tua.
            </p>
            <a href="voceterapia.php" role="button" class="btn more-btn" aria-label="Approfondisci">Approfondisci <span><i class="fas fa-arrow-right"></i></span></a>
        </div>
        <figure class="pt-4 pb-5">
            <div class="d-flex position-absolute w-100 justify-content-between quote-container">
                <div class="left-quote">
                    <img src="images/left-quotes-sign.svg" alt="left quote image">
                </div>
                <div class="right-quote">
                    <img src="images/right-quotes-sign.svg" alt="right quote image">
                </div>
            </div>
            <blockquote class="blockquote">
                <p>“La voce umana è il più bello strumento che esista, ma è anche il più difficile da suonare.”</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">(Richard Strauss)</cite>
            </figcaption>
        </figure>
    </div>

    <!-- FORMAZIONE -->
    <div id="Formazione">
        <div class="content-padding">
            <h2 class="py-4">Su di me ...</h2>
            <div class="row pb-4">
                <div class="col-lg-3">
                    <img src="images/elisa2.png" alt="foto elisa fortunati">
                </div>
                <div class="col-lg-9">
                    <div class="row full-height ps-4">
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
                        <div class="align-self-end pb-3">
                            <a href="formazione.php" role="button" class="btn more-btn" aria-label="Approfondisci">Approfondisci <span><i class="fas fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENSIONI -->
    <div id="Recensioni" class="background-light pb-5">
        <div class="content-padding">
            <h2 class="py-4 text-center">Dicono di me ...</h2>
            <div class="row py-4">
<?php
foreach($recensioni as $r) {
$stars = "<div class='text-center'>";
for($i=0; $i<$r->get_punteggio(); $i++) {
$stars .= <<<DELIMETER
<div class="d-inline">
    <i class="fas fa-star"></i>
</div>
DELIMETER;
}
for($i=0; $i<5-($r->get_punteggio()); $i++) {
$stars .= <<<DELIMETER
<div class="d-inline">
    <i class="far fa-star"></i>
</div>
DELIMETER;
}
$stars .= "</div>";
$review = <<<DELIMETER
<div class="col-lg-4">
    <div class="card mx-2">
        <div class="card-body">
            <div class="row pb-3 align-items-center">
                <div class="col-lg-2">
                    <img src="images/{$r->get_foto_autore()}" alt="foto autore recensione">
                </div>
                <div class="col-lg-10">
                    <p class="card-subtitle text-muted">{$r->get_autore()}</p>
                </div>
            </div>
            <p class="card-title pb-2">{$r->get_titolo()}</p>
            <p class="card-text">{$r->get_testo()}</p>
            <p class='text-muted'>{$r->get_data()}</p>
DELIMETER;
$review .= $stars;
$review .= "</div></div></div>";
echo $review;
}
?>
            </div>
            <a href="recensioni.php#AllReviews" role="button" class="btn more-btn float-end" aria-label="Tutte le recensioni">Tutte le recensioni <span><i class="fas fa-arrow-right"></i></span></a>
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