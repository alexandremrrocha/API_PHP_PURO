<?php
    define("ROOT_PATH", __DIR__ . "/../" );
    define("DATABSE_FILE", ROOT_PATH . 'database.json');

    require_once ROOT_PATH . "/Controller/BaseController.php";
    require_once ROOT_PATH . "/Model/UserModel.php";
?>