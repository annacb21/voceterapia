<?php

ob_start();

session_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);


defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");

defined("IMAGES") ? null : define("IMAGES", __DIR__ . DS . "../images");
?>