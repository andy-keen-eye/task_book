<?php

require("../includes/config.php");
require("../includes/helpers.php");
require("../includes/model.php");

session_start();

if ($_SESSION["id"] == NULL)
{
    header('Location: /');
    exit;
}

$status = ($_POST['finished'] == 'on') ? 1 : 0;
$dbh = pdoConnection($db_user, $db_pass, $database);
edit_task($dbh, $_POST['id'], $_POST['task'], $status);

header('Location: /');
exit;