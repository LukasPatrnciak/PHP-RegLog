<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: register.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak
    -->
</html>

<?php
include ('sql/mysql.php');
include ('common.php');
include ('language.php');

// Register
if(isset($_POST['registerButton'])) 
{
    $username  = $_POST['registerUsername'];
    $name  = $_POST['registerName'];
    $surname  = $_POST['registerSurname'];
    $email  = $_POST['registerEmail'];
    $password  = $_POST['registerPassword'];
    $rePassword  = $_POST['registerRePassword'];

    if($username == 'root' or $username = 'LukasPatrnciak' or $username = 'LukeP')
    {
        $administrator = 1;
    } else {
        $administrator = 0;
    }

    $sql = "SELECT username FROM users WHERE username='$username'";
    $query = mysqli_query($connect, $sql);
    
    if($password != $rePassword)
    {
        $_SESSION['errorMessage'] = 'Zadané heslá sa nezhodujú';
        header('location: administration/index.php');
    } 
    elseif(empty($username) and empty($email) and empty($password) and empty($rePassword))
    {
        $_SESSION['errorMessage'] = 'Pre dokončenie registrácie je potrebné vyplniť povinné polia označené *';
        header('location: administration/index.php');
    }
    elseif(mysqli_num_rows($query) >= 1)
    {
        $_SESSION['errorMessage'] = 'Účet s týmto používateľským menom už exisuje';
        header('location: administration/index.php');
    }
    elseif(strlen($username) > 8)
    {
        $_SESSION['errorMessage'] = 'Používateľské meno môže obsahovať najviac 8 znakov';
        header('location: administration/index.php');
    }
    elseif(strlen($password) < 8)
    {
        $_SESSION['errorMessage'] = 'Heslo musí obsahovať minimálne 8 znakov';
        header('location: administration/index.php');
    } else {
        $password = md5($password);

        $sql = "INSERT INTO users(username, name, surname, email, password, administrator) VALUES('$username', '$name', '$surname', '$email', '$password', '$administrator')";
        mysqli_query($connect, $sql);

        $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        $userid = $row['id'];

        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;

        $_SESSION['okMessage'] = 'Registrácia prebehla úspešne';
        header('location: administration/index.php');
    }
}
?>