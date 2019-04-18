<?php

require("../includes/config.php");
require("../includes/helpers.php");
require("../includes/model.php");

if (($_POST["name"] == NULL) || ($_POST["email"] == NULL) || $_POST["task"] == NULL)
{
    $error = 'error';
    render('../views/add_task.php', array($error));
    exit;
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
    $error = 'email';
    render('../views/add_task.php', array($error));
    exit;
}

$dbh = pdoConnection($db_user, $db_pass, $database);

insert_new_task($dbh, $_POST["name"], $_POST["email"], $_POST["task"]);

header('Location: /');
exit;