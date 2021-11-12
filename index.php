<?php require_once("resources/config.php"); ?>

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
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- HEADER -->
    <div id="Header">
        <div class="row">
            <div class="col-lg-6">
                <p>Insegnate di</p>
                <h1>Voceterapia</h1>
            </div>
            <div class="col-lg-6">
                <img src="images/grigio-ginocchio.jpg" alt="foto elisa fortunati">
            </div>
        </div>
    </div>

    <!-- VOCETERAPIA -->
    <div>
        <h2>Cos'è la voceterapia?</h2>
        <p>La voce è lo strumento più naturale che esista.
        Ciascuno di noi nasce con questa “dotazione”, personalissima ed unica, che lo rende per questo speciale e irripetibile.
        Ciascuna voce è, però, non solo legata alle nostre caratteristiche fisiche e morfologiche  ma anche alla storia soggettiva, ai vissuti, che fanno parte di noi e che, in qualche modo,  anche il nostro strumento vocale racconta.
        Lavorando quindi sul nostro principale e immediato mezzo di comunicazione, si entra in un campo di analisi che è anche “altro” rispetto a quello semplicemente canoro o verbale, in virtù di questa connessione inedita tra voce e anima, tra parola e inconscio.
        Il corpo, attraverso la voce, parla la lingua delle emozioni.
        Il mio ruolo è aiutarti a capire meglio come farla tua.
        </p>
        <button type="button" class="btn btn-primary">Approfondisci <span><i class="fas fa-arrow-right"></i></span></button>
        <figure>
            <blockquote class="blockquote">
                <p>“Se canti solo con la voce, prima o poi dovrai tacere. Canta con il cuore, affinché tu non debba mai tacere.”</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">Augusto Daolio</cite>
            </figcaption>
        </figure>
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