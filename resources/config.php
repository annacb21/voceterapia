<?php

ob_start();

session_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);


defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("IMAGES") ? null : define("IMAGES", __DIR__ . DS . "../images");

defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "u529235838_voceterapia");

defined("DB_PASS") ? null : define("DB_PASS", "Poppocorno96");

defined("DB_NAME") ? null : define("DB_NAME", "u529235838_voceterapia_db");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

require_once("functions.php");

?>