<?php

session_start();
$_SESSION["id"] = NULL;
header('Location: /');
exit;