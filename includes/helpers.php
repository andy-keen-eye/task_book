<?php

//render views
function render($view, $values)
{
    extract ($values);
    require('../views/header.php');
    require($view);
    require('../views/footer.php');
}

//set sort order and sort direction for table
function set_sort_table($sort_by, $direction)
{
    session_start();
    $_SESSION["sort_by"] = $sort_by;
    $_SESSION["sort_direction"] = $direction;
    return;
}

//set sort order and sort direction for column
function get_sort_column($sort_by, $direction)
{
    session_start();
    if ( $_GET['sort'] !== NULL )
    {
        if (($_SESSION["sort_by"] != NULL) && ($_SESSION["sort_direction"] != NULL) && ($_SESSION["sort_by"] == $_GET['sort']))
        {
            $direction = ($_SESSION["sort_direction"] == 'asc') ? 'desc' : 'asc';
            set_sort_table($_GET['sort'], $direction);
        }

        set_sort_table($_GET['sort'], $direction);
        return array($_GET['sort'], $direction);
    }
    else
    {
        if ($_SESSION["sort_by"] != NULL)
        {
            return array($_SESSION["sort_by"], $_SESSION["sort_direction"]);
        }
        else
        {
            set_sort_table($sort_by, $direction);
            return array($sort_by, $direction);
        }
    }
}