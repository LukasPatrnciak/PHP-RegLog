<?php
/*
== LukasPatrnciak ==
Filename: includes/language.php
Author: Lukas Patrnciak
www.lukaspatrnciak.sk

(C) 2018 Lukáš Patrnčiak
*/

// Language
if(isset($_GET['lang']))
{
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
} else if(isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = 'sk';
}

switch($lang) 
{
  case 'sk':
    $lang_file = 'sk.php';
    break;

  case 'en':
    $lang_file = 'en.php';
    break;

  case 'de':
    $lang_file = 'de.php';
    break;
}

include('lang/'.$lang_file);
?>