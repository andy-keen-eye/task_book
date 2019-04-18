<?php

require("../includes/config.php");
require("../includes/helpers.php");
require("../includes/model.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    // else render form
    render('../views/login.php', array());
    exit;
}

if (($_POST["admin_name"] == NULL) || ($_POST["password"] == NULL))
{
    $error = 'error';
    render('../views/login.php', array($error));
    exit;
}

$dbh = pdoConnection($db_user, $db_pass, $database);

//insert admin into db once
//insert_admin($dbh, $_POST["admin_name"], password_hash($_POST["password"], PASSWORD_DEFAULT));

$result_data = select_admin($dbh, $_POST["admin_name"], $_POST["password"]);

if (count($result_data) == 1)
{
    if (password_verify($_POST["password"], $result_data[0]["hash"]))
    {
        session_start();
        $_SESSION["id"] = $result_data[0]["id"];
        header('Location: /');
        exit;
    }
}
$error = 'invalid';
render('../views/login.php', array($error));
exit;


