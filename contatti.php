<?php require_once("resources/config.php"); ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Contatti | Voceterapia</title>
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

    <!-- CONTATTI -->
    <div>
        <h1>Contatti</h1>
        <div class="row">
            <div class="col-lg-4">
                <h2>social</h2>
                <a href="#"><i class="fab fa-facebook"></i> <span>Elisa Fortunati</span></a>
                <a href="#"><i class="fab fa-instagram"></i> <span>@elisafortunati</span></a>
            </div>
            <div class="col-lg-4">
                <h2>Località</h2>
                <p>Verona (VR), zona centro storico</p>
            </div>
            <div class="col-lg-4">
                <h2>Email</h2>
                <p>elisa.fortunati@virgilio.it</p>
            </div>
        </div>
        <div id="contact-form">
            <h2>Invia una email</h2>
            <p>I campi contrassegnati con un * sono obbligatori</p>
            <?php display_message(); ?>
            <form action="" method="POST" class="row g-3 needs-validation" novalidate>
                <?php send_email(); ?>
                <div class="col-lg-6">
                    <label for="nome" class="form-label">* Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                    <div class="invalid-feedback">Inserire il proprio nome</div>
                </div>
                <div class="col-lg-6">
                    <label for="cognome" class="form-label">* Cognome</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome" required>
                    <div class="invalid-feedback">Inserire il proprio cognome</div>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="form-label">* Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <div class="invalid-feedback">Inserire una email valida</div>
                </div>
                <div class="col-lg-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                </div>
                <div class="col-lg-12">
                    <label for="messaggio" class="form-label">* Messaggio</label>
                    <textarea class="form-control" id="messaggio" name="messaggio" rows="5" placeholder="Scrivi qui il tuo messaggio" required></textarea>
                    <div class="invalid-feedback">Inserire un messaggio</div>
                </div>
                <div class="col-lg-12 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter procedere con il pagamento</div>
                </div>
                <button type="submit" name="sendEmail" class="btn btn-primary">Invia</button>
            </form>
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
    <script src="js/validate.js"></script>
</body>
</html>