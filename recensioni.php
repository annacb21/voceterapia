<?php 
require_once("resources/config.php"); 
$query = query("SELECT * FROM recensioni ORDER BY data_rec DESC");
confirm($query);
$recensioni = array();
$i = 0;
while($row = fetch_array($query)) {
    $d = $row['data_rec'];
    setlocale(LC_TIME, 'it_IT');
    $pdate = strftime("%d %B %Y", strtotime($d));
    $recensioni[$i] = new Recensione($row['id'], $row['autore'], $row['foto_autore'], $row['titolo'], $row['testo'], $row['punteggio'], $d);
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
</head>
<body>
    
    <!-- NAVBAR -->
    <?php include(TEMPLATE_FRONT . DS . "navbar.php"); ?>

    <!-- MAIN CONTENT -->
    <div>
        <h1>Scrivi una recensione</h1>
        <p>I campi contrassegnati con un * sono obbligatori</p>
        <?php display_message(); ?>
        <form action="" method="POST" class="row g-3 needs-validation" novalidate>
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
                <div>
                    <label for="code" class="form-label">* Codice</label>
                    <input type="text" class="form-control" id="code" name="code" aria-describedby="codeHelp" maxlength="15" required>
                    <div id="codeHelp" class="form-text">Il codice di 15 cifre viene rilasciato dall’insegnante per garantire l’autenticità della recensione</div>
                    <div class="invalid-feedback">Inserire il codice ricevuto dall'insegnante</div>
                </div>
                <div class="rating my-3">
                    <p>Assegna un punteggio da 1 a 5 stelle</p>
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
            <div class="col-lg-6">
                <label for="recensione" class="form-label">* Recensione</label>
                <textarea class="form-control" id="recensione" name="recensione" rows="5" placeholder="Scrivi la tua recensione ..." aria-describedby="recHelp" maxlength="410" required></textarea>
                <div id="recHelp" class="form-text">Lunghezza max. di 410 caratteri</div>
                <div class="invalid-feedback">Inserire una recensione</div>
            </div>
            <div class="col-lg-12 form-check">
                <input class="form-check-input" type="checkbox" value="" id="checkPrivacy" name="checkPrivacy" required>
                <label class="form-check-label" for="checkPrivacy">Dichiaro di aver letto la Privacy Policy e di acconsentire, ai soli fini del servizio richiesto, al trattamento dei miei dati personali.</label>
                <div class="invalid-feedback">Devi accettare le condizioni di privacy per poter pubblicare la recensione</div>
            </div>
            <button type="submit" name="addReview" class="btn btn-primary">Pubblica</button>
        </form>
    </div>

    <div>
        <h1>Tutte le recensioni</h1>
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides align-items-center">
<?php 
foreach($recensioni as $r) {
$stars = "<div class='row'>";
for($i=0; $i<$r->get_punteggio(); $i++) {
$stars .= <<<DELIMETER
<div class="col-lg-1">
    <i class="fas fa-star"></i>
</div>
DELIMETER;
}
for($i=0; $i<5-($r->get_punteggio()); $i++) {
$stars .= <<<DELIMETER
<div class="col-lg-1">
    <i class="far fa-star"></i>
</div>
DELIMETER;
}
$stars .= "</div>";
$review = <<<DELIMETER
<li>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-1">
                    <img src="images/{$r->get_foto_autore()}" style="width: 2em;" alt="foto autore recensione">
                </div>
                <div class="col-lg-4">
                    <p class="card-subtitle text-muted">{$r->get_autore()}</p>
                </div>
            </div>
            <p class="card-title">{$r->get_titolo()}</p>
            <p class="card-text">{$r->get_testo()}</p>
DELIMETER;
$review .= $stars;
$review .= "<p class='text-muted'>{$r->get_data()}</p></div></div></li>";
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
    <div class="elfsight-app-9c4839bc-ad9b-4346-bec2-f2422c7c3122"></div>
    
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