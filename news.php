<?php 
require_once("resources/config.php"); 
$page = get_page();
$pagination_start = ($page - 1) * 4;
$page_news = show_news($pagination_start);
$query = query("SELECT * FROM news ORDER BY data_news DESC LIMIT 4");
confirm($query);
$latest_news = array();
$i = 0;
while($row = fetch_array($query)) {
    $d = date_create($row['data_news']);
    $pdate = date_format($d, 'd/m/y');
    $latest_news[$i] = new Post($row['id'], $row['titolo'], $row['testo'], $pdate);
    $i++;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>News | Voceterapia</title>
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
    <div class="content-padding background-light">
        <h1 class="py-4">News</h1>
        <div class="row">
            <div class="col-lg-9">
                <?php if(empty($page_news)) {echo "<p>Non è presente alcuna news</p>";} ?>
                <ul id="news" class="px-0">
<?php 
foreach($page_news as $n) {
$post = <<<DELIMETER
<li class="py-4 bottom-border">
    <p class="news-title">{$n->get_titolo()}</p>
    <p class="text-muted">{$n->get_data()}</p>
    <p>{$n->get_text_ant()}</p>
    <a href="newsDetail.php?id={$n->get_id()}">Leggi di più ...</a>
</li>
DELIMETER;
echo $post;
}
?>
                </ul>
                <!-- pagination -->
                <?php show_pagination($page); ?>
            </div>

            <!-- FILTERS -->
            <div class="col-lg-3">
                <div class="pb-2">
                    <h2 class="h3 bottom-border-dark">ULTIME NEWS</h2>
                    <ul class="px-0 pt-2">
<?php 
foreach($latest_news as $n) {
$lpost = <<<DELIMETER
<li class="pt-3 latest-news">
    <a href="newsDetail.php?id={$n->get_id()}">{$n->get_titolo()}</a>
</li>
DELIMETER;
echo $lpost;
}
?>
                    </ul>
                </div>
                <div class="pt-5">
                    <h2 class="h3 bottom-border-dark">CERCA</h2>
                    <form action="" method="POST" class="needs-validation d-flex pt-3" novalidate>
                        <input class="form-control me-2" type="text" placeholder="Cerca..." aria-label="Cerca" name="cerca">
                        <button class="btn btn-outline-primary" type="submit" name="search">Cerca</button>
                    </form>
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