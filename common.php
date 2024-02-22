<?php
/*
== LukasPatrnciak ==
Filename: includes/common.php
Author: Lukas Patrnciak
www.lukaspatrnciak.sk

(C) 2018 Lukáš Patrnčiak
*/

function loggedIn()
{
    if(isset($_SESSION['login']))
    {
        return true;
    } else {
        return false;
    }
}

function user($value)
{
    global $connect;

    $username = $_SESSION['username'];
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM users WHERE username='$username' OR id='$userid'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row[$value];
}
?>