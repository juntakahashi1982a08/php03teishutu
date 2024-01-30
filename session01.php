<?php

session_start();
// session_regenerate_id(true);
$sid = session_id();
echo $sid;

$_SESSION["name"] = "坂尻あいら";
$_SESSION["age"] = "31";



?>