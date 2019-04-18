<?php

require("../includes/config.php");
require("../includes/helpers.php");
require("../includes/model.php");

$page = 1;
$sort_by = 'name';
$sort_direction = 'asc';

$sort_data_array = get_sort_column($sort_by, $sort_direction);

$sort_by = $sort_data_array[0];
$sort_direction = $sort_data_array[1];

if ( $_GET['page'] !== NULL )
{
    $query_str = intval ( $_GET['page'] );
    if ( ( is_int ($query_str) ) && ( $query_str !== 0 ) )
    {
        $page = $query_str;
    }
}

$dbh = pdoConnection($db_user, $db_pass, $database);

$amount_on_page = 3;

$end = $page * $amount_on_page;
$start = $end - 2;
$limit = $amount_on_page * 3;

//select three pages
$result_data = select_page_data($dbh, $start, $limit, $sort_by, $sort_direction);

$next_pages_amount = get_next_page_amount($result_data, $amount_on_page);

//get first $amount_on_page
$result_data = array_slice ($result_data, 0, $amount_on_page);

session_start();
if ($_SESSION["id"] != NULL)
{
   render('../views/admin_table.php', array($result_data, $page, $next_pages_amount, $sort_by, $sort_direction));
   exit;
}
else
{
    render('../views/table.php', array($result_data, $page, $next_pages_amount, $sort_by, $sort_direction));
    exit;
}



//define amount of next pages for pagination
function get_next_page_amount($result_data, $amount_on_page)
{
    $count = count( $result_data );
    $next_pages_amount = 0;
    if ($count > ($amount_on_page * 2)) $next_pages_amount = 3;
    else if ($count > $amount_on_page ) $next_pages_amount = 2;
    else if ( ($count != 0) && ($count <= $amount_on_page) )
    {
        $next_pages_amount = 1;
    }
    else if ($count == 0 )
    {
        render('../views/error_404.php', array());
        exit;
    }
    return $next_pages_amount;
}

//filling the db table
/*    for ($i = 0, $name = 'John', $email = 'john@gmail.com', $task = 'task '; $i < 100; $i++)
    {
        $sql_name = $name.'_'.$i;
        $sql_email = $i.'_'.$email;
        $sql_task = $task.'_'.$i;
        insert_users($dbh, $sql_name, $sql_email, $sql_task);
    }
*/