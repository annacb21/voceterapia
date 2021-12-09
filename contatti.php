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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- CONTATTI -->
    <div id="Contatti" class="content-padding background-light">
        <h1 class="py-4 text-center">Contatti</h1>
        <div class="row justify-content-center pt-3 pb-5 bottom-border">
            <div class="col-lg-4 col-md-4 contact-col">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <img src="images/phone-icon.png" class="contact-icon" alt="phone contact icon">
                    </div>
                    <div class="col-lg-9 col-md-10">
                        <h2 class="pb-3 h3">Telefono</h2>
                        <p>+39 338 8210704</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 contact-col">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <img src="images/where-icon.png" class="contact-icon" alt="location contact icon">
                    </div>
                    <div class="col-lg-9 col-md-10">
                        <h2 class="pb-3 h3">Località</h2>
                        <p>Verona (VR), zona centro storico</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 contact-col">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <img src="images/email-icon.png" class="contact-icon" alt="email contact icon">
                    </div>
                    <div class="col-lg-9 col-md-10">
                        <h2 class="pb-3 h3">Email</h2>
                        <p>elisa.fortunati@virgilio.it</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact-form" class="py-5 w-75 m-auto">
            <h2 class="text-center">Invia una email</h2>
            <p class="text-center text-muted pt-2 pb-4">I campi contrassegnati con un * sono obbligatori</p>
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
                    <label for="telefono" class="form-label">* Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                    <div class="invalid-feedback">Inserire un numero di telefono</div>
                </div>
                <div class="col-lg-12">
                    <label for="messaggio" class="form-label">* Messaggio</label>
                    <textarea class="form-control" id="messaggio" name="messaggio" rows="5" placeholder="Scrivi qui il tuo messaggio" required></textarea>
                    <div class="invalid-feedback">Inserire un messaggio</div>
                </div>
                <div class="col-lg-12 form-check pb-5">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la <a href="https://www.iubenda.com/privacy-policy/73127717" class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter procedere</div>
                </div>
                <button type="submit" name="sendEmail" class="btn form-btn m-auto">Invia</button>
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