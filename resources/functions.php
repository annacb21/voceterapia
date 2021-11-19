<?php

require_once("classes/recensione.php");
require_once("database.php");
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


?>