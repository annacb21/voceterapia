<?php 
require_once("../resources/config.php");
if(!isset($_SESSION['user'])) {
    redirect("../index.php");
}
$query = query("SELECT * FROM utenti WHERE id = '{$_SESSION['user']}' LIMIT 1");
confirm($query);
$row = fetch_array($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Area amministrazione</title>
    <meta charset="utf-8">
    <meta name="description" content=""/>
    <meta name="keywords" content="voceterpia, insegnate di voceterapia, elisa fortunati, verona, lezioni di canto, insegnante di canto, canto, logopedista, terapista, recitazione, dizione, riabilitazione, rieducazione, psicologa, balbuzie, tecnica vocale, postura, benessere, rilassamento, anti stress"/>
    <meta name="author" content="Anna Cisotto Bertocco"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <!-- SIDEBAR -->
    <?php include(TEMPLATE_BACK . DS . "sidebar.php"); ?>

    <!-- MAIN CONTENT -->
    <div class="main-admin">
        <header class="d-flex justify-content-between">
            <h2>
                <label for="sidebar-toggle"><i class="fas fa-bars"></i></label>
                <?php get_page_title(); ?>
            </h2>
            <div class="user-wrapper d-flex align-items-center">
                <img src="../images/admin-profile.png" alt="Icona profilo utente">
                <div>
                    <p class="mb-0"><?php echo $row['username']; ?></p>
                    <small class="d-inline-block text-muted">Super admin</small>
                </div>
            </div>
        </header>
        <?php show_admin_content(); ?>
    </div>

    <script src="https://kit.fontawesome.com/90922573b7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>