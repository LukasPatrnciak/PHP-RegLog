<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: logout.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak
    -->
</html>

<?php
include ('sql/mysql.php');
include ('common.php');
include ('language.php');

if(isset($_POST['logoutButton']))
{
    if(loggedIn() == true)
    {
        unset($_SESSION['username']);
        unset($_SESSION['authorname']);
        unset($_SESSION['userid']);
        session_destroy();
    } else {
        header('location: index.php');
    }
    session_destroy();
    header('location: index.php');
}
?>