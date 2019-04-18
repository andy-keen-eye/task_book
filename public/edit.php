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

if ( $_GET['task'] == NULL )
{
    header('Location: /');
    exit;
}
else
{
    $query_str = intval ( $_GET['task'] );
    if ( ( is_int ($query_str) ) && ( $query_str !== 0 ) )
    {
        $_GET['task'] = $query_str;
    }
}

$dbh = pdoConnection($db_user, $db_pass, $database);
$select_result = select_task_data($dbh, $_GET['task']);

if (count ($select_result) != 1)
{
    header('Location: /');
    exit;
}

render('../views/edit_task.php', $select_result[0]);
exit;