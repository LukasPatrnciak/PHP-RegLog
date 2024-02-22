<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: login.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak
    -->
</html>

<?php
include ('sql/mysql.php');
include ('common.php');
include ('language.php');

// Login
if(isset($_POST['loginButton'])) 
{
    $username  = $_POST['loginUsername'];
    $password  = $_POST['loginPassword'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);
    
    $userid = $row['id'];
    $passwordQ = $row['password'];

    if(empty($username) and empty($password)) 
    {
        $_SESSION['errorMessage'] = 'Pre prihlásenie do systému je potrebné vyplniť pole meno a heslo';
        header('location: administration/index.php');
    } 
    elseif(mysqli_num_rows($query) == 0)
    {
        $_SESSION['errorMessage'] = 'Účet s týmto používateľským menom neexisuje';
        header('location: administration/index.php');
    }
    elseif(md5($password) != $passwordQ)
    {
        $_SESSION['errorMessage'] = 'Prihlasovacie meno a heslo sa nezhoduje';
        header('location: administration/index.php');
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userid;
        $_SESSION['login'] = true;

        $_SESSION['okMessage'] = 'Prihlásenie prebehlo úspešne';
        header('location: administration/index.php');
    }
}
?>