<?php
$title = "title";
$user = "LEECS";
$page = file_get_contents("example.html");
str_replace("_title", $title, $page);
str_replace("_user", $title, $page);
echo $page;