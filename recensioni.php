<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Recensioni | Voceterapia</title>
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

    <!-- MAIN CONTENT -->
    <div>
        <h1>Scrivi una recensione</h1>
        <p>I campi contrassegnati con un * sono obbligatori</p>
        <form action="" method="POST" class="row g-3 needs-validation" novalidate>
            <div class="col-lg-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Mario Rossi, Mario ..." aria-describedby="nameHelp">
                <div id="nameHelp" class="form-text">Non inserire nulla se si vuole pubblicare la recensione come utente anonimo</div>
            </div>
            <div class="col-lg-6">
                <label for="titolo" class="form-label">* Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Ottima insegnante di canto ..." required>
                <div class="invalid-feedback">Inserire un titolo per la recensione</div>
            </div>
            <div class="col-lg-6">
                <div>
                    <label for="code" class="form-label">* Codice</label>
                    <input type="text" class="form-control" id="code" name="code" aria-describedby="codeHelp" required>
                    <div id="codeHelp" class="form-text">Il codice viene rilasciato dall’insegnante per garantire l’autenticità della recensione</div>
                    <div class="invalid-feedback">Inserire il codice ricevuto dall'insegnante</div>
                </div>
                <div class="rating my-3">
                    <p>Assegna un punteggio da 1 a 5 stelle</p>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                    <i class="rating__star far fa-star"></i>
                </div>
            </div>
            <div class="col-lg-6">
                <label for="recensione" class="form-label">* Recensione</label>
                <textarea class="form-control" id="recensione" name="recensione" rows="5" placeholder="Scrivi la tua recensione ..." aria-describedby="recHelp" required></textarea>
                <div id="recHelp" class="form-text">Lunghezza max. di 280 caratteri</div>
                <div class="invalid-feedback">Inserire una recensione</div>
            </div>
            <div class="col-lg-12 form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter pubblicare la recensione</div>
            </div>
            <div class="col-lg-12">
                <button type="submit" name="pubReview" class="btn btn-primary">Pubblica</button>
                <p class="d-inline mx-5">oppure</p>
                <a href="https://www.google.com/search?q=voce+terapia+verona&oq=voc&aqs=chrome.0.69i59l2j35i39j69i57j46i433i512l2j69i60l2.726j0j7&sourceid=chrome&ie=UTF-8#lrd=0x477f5fb8b9aa42c9:0x2cedbd42565a40bf,3,,," role="button" class="btn btn-warning d-inline" aria-label="aggiungi recensione con Google">Scrivi una recensione tramite Google</a>
            </div>
        </form>
    </div>
    
    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
    <script src="js/validate.js"></script>
    <script>
        const ratingStars = [...document.getElementsByClassName("rating__star")];
        function executeRating(stars) {
            const starClassActive = "rating__star fas fa-star";
            const starClassInactive = "rating__star far fa-star";
            const starsLength = stars.length;
            let i;
            stars.map((star) => {
                star.onclick = () => {
                    i = stars.indexOf(star);
                    if (star.className===starClassInactive) {
                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                    }
                };
            });
        }
        executeRating(ratingStars);
    </script>
</body>
</html>