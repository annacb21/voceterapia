<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Elisa Fortunati</a>
        <a class="visually-hidden-focusable" href="#Header">Vai al contenuto principale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Riduci navigazione">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){echo "active";} else {echo "";} ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "formazione.php"){echo "active";} else {echo "";} ?>" href="formazione.php">Formazione</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "voceterapia.php"){echo "active";} else {echo "";} ?>" href="voceterapia.php">Voceterapia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "canto.php"){echo "active";} else {echo "";} ?>" href="canto.php">Canto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "recensioni.php"){echo "active";} else {echo "";} ?>" href="recensioni.php">Recensioni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "news.php" || basename($_SERVER['PHP_SELF']) == "newsDetail.php"){echo "active";} else {echo "";} ?>" href="news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == "contatti.php"){echo "active";} else {echo "";} ?>" href="contatti.php">Contatti</a>
                </li>
                <?php
                    if(isset($_SESSION['user'])) {
                        echo "<li class='nav-item'><a href='admin/index.php' class='nav-link'>Admin</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>