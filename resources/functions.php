<?php

require_once("classes/recensione.php");
require_once("classes/post.php");
require_once("database.php");

use PHPMailer\PHPMailer\PHPMailer;
date_default_timezone_set('Etc/UTC');

//*************************** SYSTEM FUNCTIONS ****************************
// redirect to a page
function redirect($location) {
    return header("Location: $location ");
}

// create an alert message
function set_message($msg, $alert_type) {
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
        $_SESSION['alert'] = $alert_type;
    }
    else {
        $msg = "";
        $alert_type = "";
    }
}

// display an alert message
function display_message() {

if(isset($_SESSION['message']) && isset($_SESSION['alert'])) {
    
$alert = <<<DELIMETER
<div class="alert {$_SESSION['alert']} w-50 text-center mx-auto" role="alert">
    {$_SESSION['message']}
</div>
DELIMETER;
echo $alert;
unset($_SESSION['message']);
}

}

// add a review
function addReview() {
    if(isset($_POST['addReview'])) {
        $nome = escape_string($_POST['nome']) == "" ? "anonimo" : escape_string($_POST['nome']);
        $titolo = escape_string($_POST['titolo']);
        $codice = escape_string($_POST['code']);
        $punteggio = escape_string($_POST['score']);
        $testo = escape_string($_POST['recensione']);

        $get_query = query("SELECT * FROM codici WHERE id = '{$codice}' AND usato = 'false' LIMIT 1");
        confirm($get_query);
        if(mysqli_num_rows($get_query) == 0) {
            set_message("Il codice inserito risulta non valido o già usato", "alert-danger");
            redirect("recensioni.php");
        }
        else {
            $update_query = query("UPDATE codici SET usato = 'true' WHERE id = '{$codice}'");
            confirm($update_query);
            $query = query("INSERT INTO recensioni(id, autore, foto_autore, titolo, testo, punteggio, data_rec) VALUES ('{$codice}', '{$nome}', NULL, '{$titolo}', '{$testo}', '{$punteggio}', now())");
            confirm($query);
            set_message("Recensione pubblicata con successo", "alert-success");
            redirect("recensioni.php");
        }
    }
}

// count pages for pagination
function get_page() {
    return (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
}

// shows articles
function show_news($start) {
    $news = array();
    if(isset($_POST['search'])) {
        $str = escape_string($_POST['cerca']);
        $q = query("SELECT * FROM news WHERE titolo LIKE '%$str%' ORDER BY data_news DESC LIMIT 0, 4");
        confirm($q);
        if($q->num_rows > 0) {
            $i = 0;
            while($row = fetch_array($q)) {
                $d = $row['data_news'];
                setlocale(LC_TIME, 'it_IT');
                $date = strftime("%d %B %Y", strtotime($d));
                $news[$i] = new Post($row['id'], $row['titolo'], $row['testo'], $date);
                $i++;
            }
        }
    }
    else {
        $q = query("SELECT * FROM news ORDER BY data_news DESC LIMIT $start, 4");
        confirm($q);
        $i = 0;
        while($row = fetch_array($q)) {
            $d = $row['data_news'];
            setlocale(LC_TIME, 'it_IT');
            $date = strftime("%d %B %Y", strtotime($d));
            $news[$i] = new Post($row['id'], $row['titolo'], $row['testo'], $date);
            $i++;
        }
    }
    return $news;
}

// show pagination
function show_pagination($page) {

$tot_news = 0;
if(isset($_POST['search'])) {
$str = escape_string($_POST['cerca']);
$tot_query = query("SELECT COUNT(*) as tot FROM news WHERE titolo LIKE '%$str%'");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_news = $tot_row['tot'];
}
else {
$tot_query = query("SELECT COUNT(*) as tot FROM news");
confirm($tot_query);
$tot_row = fetch_array($tot_query);
$tot_news = $tot_row['tot'];
}

if($tot_news > 4) {

$tot_pages = ceil($tot_news / 4);
$prev = $page - 1;
$next = $page + 1;
if($page <= 1) {
$dis = " disabled";
$plink = "#";
}
else {
$dis = "";
$plink = "?page=" . $prev;
}

$pag = <<<DELIMETER
<nav aria-label="Navigazione pagine">
    <ul class="pagination">
        <li class="page-item{$dis}">
            <a class="page-link" href="{$plink}" aria-label="Indietro">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
DELIMETER;

for($i = 1; $i <= $tot_pages; $i++) {
if($page == $i) {
$act = " active";
}
else {
$act = "";
}
$pag .= <<<DELIMETER
<li class="page-item{$act}">
    <a class="page-link" href="news.php?page={$i}">{$i}</a>
</li>
DELIMETER;
}

if($page >= $tot_pages) {
$d = " disabled";
$alink = "#";
}
else {
$d = "";
$alink = "?page=" . $next;
}
$pag .= <<<DELIMETER
        <li class="page-item{$d}">
            <a class="page-link" href="{$alink}" aria-label="Avanti">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
DELIMETER;

echo $pag;

}

}

//send an email from the contact form
function send_email() {
    require 'vendor/autoload.php';
    if(isset($_POST['sendEmail'])) {
        $nome = escape_string($_POST['nome']);
        $cognome = escape_string($_POST['cognome']);
        $email = escape_string($_POST['email']);
        $phone = escape_string($_POST['telefono']);
        $message = escape_string($_POST['messaggio']);
        $toEmail = "voceterapiaverona@gmail.com"; 

        $mail = new PHPMailer();
        $mail->setFrom('postmaster@andreacostacurta.it', "Admin");
        $mail->addReplyTo($email, $nome . " " . $cognome);
        $mail->addAddress($toEmail, 'Admin'); 
        $mail->Subject = 'Messaggio da ' . $nome . " " . $cognome;
        $mail->Body = "Recapito telefonico: " . $phone . "\n";
        $mail->Body .= $message;

        if($mail->send()) {
            set_message("La tua email è stata inviata con successo", "alert-success");
        } 
        else {
            set_message("Oops, qualcosa è andato storto: " . $mail->ErrorInfo, "alert-danger");  
        }

        redirect("contatti.php");
    }

}

// login the admin user
function login() {
    if(isset($_POST['login'])) {
        $username = escape_string($_POST['username']);
        $psw = escape_string($_POST['psw']);

        $query = query("SELECT * FROM utenti WHERE username = '{$username}' LIMIT 1");
        confirm($query);
        $row = fetch_array($query);

        if(mysqli_num_rows($query) == 0 || password_verify($psw, $row['psw']) === false) {
            set_message("La tua password o il tuo username sono sbagliati", "alert-danger");
            redirect("login.php");
        }
        else {
            $_SESSION['user'] = $row['id'];
            redirect("admin/admin.php");
        }
    }
}

//*************************** BACK FUNCTIONS ****************************

// show admin dashboard content dynamically
function show_admin_content() {
    if($_SERVER['REQUEST_URI'] == "/voceterapia/admin/" || $_SERVER['REQUEST_URI'] == "/voceterapia/admin/admin.php" ) {
        include(TEMPLATE_BACK . "/dashboard.php");
    }

    if(isset($_GET['news'])) {
        include(TEMPLATE_BACK . "/news.php");
    }

    if(isset($_GET['edit-news'])) {
        include(TEMPLATE_BACK . "/edit-news.php");
    }

    if(isset($_GET['delete-news'])) {
        include(TEMPLATE_BACK . "/delete-news.php");
    }

    if(isset($_GET['users'])) {
        include(TEMPLATE_BACK . "/users.php");
    }

    if(isset($_GET['edit-user'])) {
        include(TEMPLATE_BACK . "/edit-user.php");
    }

    if(isset($_GET['logout'])) {
        include(TEMPLATE_BACK . "/logout.php");
    }
}

// set the admin page title dynamically
function get_page_title() {
    $title = "";
    if($_SERVER['REQUEST_URI'] == "/voceterapia/admin/" || $_SERVER['REQUEST_URI'] == "/voceterapia/admin/admin.php" ) {
        $title = "Dashboard";
    }

    if(isset($_GET['news'])) {
        $title = "Gestione news";
    }

    if(isset($_GET['edit-news'])) {
        $title = "Modifica news";
    }

    if(isset($_GET['users'])) {
        $title = "Gestione utenti";
    }
    echo $title;
}

// add a review
function getReviewCode() {
    if(isset($_POST['codeSubmit'])) {
        $code = uniqid();

        $query = query("INSERT INTO codici(id, usato) VALUES ('{$code}', 'false')");
        confirm($query);
        
        $_SESSION['code'] = $code;
    }
}

// add news
function addNews() {
    if(isset($_POST['addNews'])) {
        $titolo = escape_string($_POST['titolo']);
        $testo = escape_string($_POST['testo']);

        $query = query("INSERT INTO news(titolo,testo,data_news) VALUES ('{$titolo}', '{$testo}', now())");
        confirm($query);
        set_message("News pubblicata con successo", "alert-success");
        redirect("admin.php?news");
    }
}

// edit post
function editNews($id) {
    if(isset($_POST['editNews'])) {
        $titolo = escape_string($_POST['titolo']);
        $testo = escape_string($_POST['testo']);

        $query = query("UPDATE news SET titolo = '{$titolo}', testo = '{$testo}' WHERE id = $id");
        confirm($query);
        set_message("News modificata con successo", "alert-success");
        redirect("admin.php?news");
    } 
}

// add new user
function addUser() {
    if(isset($_POST['addUser'])) {
        $username = escape_string($_POST['username']);
        $psw1 = escape_string($_POST['psw1']);
        $psw2 = escape_string($_POST['psw2']);

        if(password_verify($psw1, $psw2) === true) {
            $hash_psw = password_hash(escape_string($psw1), PASSWORD_DEFAULT);
            $query = query("INSERT INTO utenti(username, psw) VALUES ('{$username}', '{$hash_psw}')");
            confirm($query);
            set_message("Utene aggiunto con successo", "alert-success");
        }
        else {
            set_message("Le password inserite non corrispondono", "alert-danger");
        }
        redirect("admin.php?users");
    }
}

// edit user
function editUser($row) {
    if(isset($_POST['editUser'])) {
        $current_psw = escape_string($_POST['current_psw']);
        $psw1 = escape_string($_POST['psw1']);
        
        if(password_verify($current_psw, $row['psw']) === true) {
            $new_psw = password_hash($psw1, PASSWORD_DEFAULT);
            $query = query("UPDATE utenti SET psw = '{$new_psw}' WHERE id = '{$row['id']}'");
            confirm($query);
            set_message("Password modificata con successo", "alert-success");
        }
        else {
            set_message("Le password non sono corrette", "alert-danger");
        }
        redirect("../admin/admin.php?users");
    }
}

?>