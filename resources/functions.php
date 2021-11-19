<?php

require_once("classes/recensione.php");
require_once("database.php");

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


?>