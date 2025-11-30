<?php 
require_once("resources/config.php"); 
require_once("resources/allReviews.php");
$recensioni = array();
// sort by date desc (dates are in d/m/Y in the array)
usort($allReviews, function($a, $b) {
    $da = DateTime::createFromFormat('d/m/Y', $a['dataCreazione']);
    $db = DateTime::createFromFormat('d/m/Y', $b['dataCreazione']);
    if (!$da) $da = new DateTime('@0');
    if (!$db) $db = new DateTime('@0');
    return $db <=> $da;
});
$i = 0;
foreach($allReviews as $row) {
    $d = DateTime::createFromFormat('d/m/Y', $row['dataCreazione']);
    if (!$d) { $d = new DateTime($row['dataCreazione']); }
    $pdate = $d->format('d/m/y');
    $recensioni[$i] = new Recensione($row['id'], $row['autore'], $row['titolo'], $row['testo'], $row['punteggio'], $pdate);
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
                <div class="col-lg-2 col-md-1">
                    <img src="images/user-circle.svg" alt="">
                </div>
                <div class="col-lg-10 col-md-11">
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
    <script>
        new Glide('.glide', {
            type: 'slider',
            startAt: 0,
            perView: 3,
            focusAt: 0,
            animationDuration: 1000,
            gap: 10,
            breakpoints: {
                1200: {
                perView: 2
                },
                992: {
                perView: 1
                }
            }
        }).mount()
    </script>
</body>
</html>