<?php 
require_once("resources/config.php"); 
$query = query("SELECT * FROM recensioni ORDER BY data_rec DESC");
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
    <title>Recensioni | Voceterapia</title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content="voceterpia, insegnate di voceterapia, elisa fortunati, verona, lezioni di canto, insegnante di canto, canto, logopedista, terapista, recitazione, dizione, riabilitazione, rieducazione, psicologa, balbuzie, tecnica vocale, postura, benessere, rilassamento, anti stress"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- MAIN CONTENT -->
    <div class="background-light pt-4">
        <div class="w-75 m-auto py-4 bottom-border">
            <h1 class="text-center">Scrivi una recensione</h1>
            <p class="text-center text-muted">I campi contrassegnati con * sono obbligatori</p>
            <?php display_message(); ?>
            <form action="" method="POST" class="row g-4 needs-validation py-4" novalidate>
                <?php addReview(); ?>
                <div class="col-lg-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Mario Rossi, Mario ..." aria-describedby="nameHelp" maxlength="50">
                    <div id="nameHelp" class="form-text">Non inserire nulla se si vuole pubblicare la recensione come utente anonimo</div>
                </div>
                <div class="col-lg-6">
                    <label for="titolo" class="form-label">* Titolo</label>
                    <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Ottima insegnante di canto ..." maxlength="100" required>
                    <div class="invalid-feedback">Inserire un titolo per la recensione</div>
                </div>
                <div class="col-lg-6">
                    <div class="row full-height">
                        <div>
                            <label for="code" class="form-label">* Codice</label>
                            <input type="text" class="form-control" id="code" name="code" aria-describedby="codeHelp" maxlength="15" required>
                            <div id="codeHelp" class="form-text">Codice di 15 cifre che viene rilasciato dall’insegnante per garantire l’autenticità della recensione</div>
                            <div class="invalid-feedback">Inserire un codice valido</div>
                        </div>
                        <div class="rating pt-3 align-self-end">
                            <p>* Assegna un punteggio da 1 a 5 stelle</p>
                            <div class="star-rating">
                                <input type="radio" name="rate" id="rate-5" value="5" onClick="document.getElementById('score').value = this.value;">
                                <label for="rate-5" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-4" value="4" onClick="document.getElementById('score').value = this.value;">
                                <label for="rate-4" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-3" value="3" onClick="document.getElementById('score').value = this.value;">
                                <label for="rate-3" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-2" value="2" onClick="document.getElementById('score').value = this.value;">
                                <label for="rate-2" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-1" value="1" onClick="document.getElementById('score').value = this.value;">
                                <label for="rate-1" class="fas fa-star"></label>
                            </div>
                            <input type="text" class="form-control" name="score" id="score" value="" required>
                            <div class="invalid-feedback">Scegliere un punteggio da 1 a 5 stelle</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="recensione" class="form-label">* Recensione</label>
                    <textarea class="form-control" id="recensione" name="recensione" rows="7" placeholder="Scrivi la tua recensione ..." aria-describedby="recHelp" maxlength="500" required></textarea>
                    <div id="recHelp" class="form-text">Lunghezza max. di 500 caratteri</div>
                    <div class="invalid-feedback">Inserire una recensione</div>
                </div>
                <div class="col-lg-12 form-check pt-3 pb-5">
                    <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                    <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                    <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter pubblicare la recensione</div>
                </div>
                <button type="submit" name="addReview" class="btn form-btn w-25 m-auto">Pubblica</button>
            </form>
        </div>
        <div id="AllReviews" class="content-padding">
            <h2 class="py-4 text-center">Tutte le recensioni</h2>
            <div class="glide pb-3">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides align-items-center">
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
<li>
    <div class="card mx-2">
        <div class="card-body">
            <div class="row pb-3 align-items-center">
                <div class="col-lg-2">
                    <img src="images/{$r->get_foto_autore()}" alt="foto autore recensione">
                </div>
                <div class="col-lg-4">
                    <p class="card-subtitle text-muted">{$r->get_autore()}</p>
                </div>
            </div>
            <p class="card-title">{$r->get_titolo()}</p>
            <p class="card-text">{$r->get_testo()}</p>
            <p class='text-muted'>{$r->get_data()}</p>
DELIMETER;
$review .= $stars;
$review .= "</div></div></li>";
echo $review;
}
?>
                    </ul>
                </div>
                <div class="glide__bullets" data-glide-el="controls[nav]">
<?php 
for($i=0; $i<count($recensioni); $i++) {
    echo "<button class='glide__bullet' data-glide-dir='={$i}'></button>";
}
?>
            </div>
        </div>
    </div>

    <div class="elfsight-app-9c4839bc-ad9b-4346-bec2-f2422c7c3122 py-4"></div>
    
    <!-- UP BUTTON -->
    <button type="button" class="btn rounded-circle shadow btn-lg" id="upBtn" onclick="backToTop()"><i class="fas fa-chevron-up"></i></button>

    <!-- FOOTER -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/scrollToTop.js"></script>
    <script src="js/validate.js"></script>
    <script src="node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <script>
        new Glide('.glide', {
            type: 'slider',
            startAt: 0,
            perView: 3,
            focusAt: 0,
            animationDuration: 1000,
            gap: 10,
            breakpoints: {
                992: {
                perView: 2
                },
                500: {
                perView: 1
                }
            }
        }).mount()
    </script>
</body>
</html>