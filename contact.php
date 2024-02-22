<?php
include ('sql/mysql.php');
include ('common.php');
include ('language.php');

// Maintenance Mod
$config_file = 'config.php';

require_once ($config_file);

if($maintenance == '1' and loggedIn() == false) 
{
    header('location: maintenance.php');
}

// Contact
if (isset($_POST['contactSubmit']))
{
    $userid = isset($_SESSION['userid']);
    $text  = $_POST['contactText'];

    $to = 'lukaspatrnciakk@gmail.com';

    if(loggedIn() == true) 
    {
        $sql = "SELECT * FROM users WHERE id='$userid'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);

        $username = $row['username'];
        $email = $row['email'];
        
        if(empty($text))
        {
            $_SESSION['errorMessage'] = 'Pre odoslanie otázky je potrebné vyplniť obsah správy';
        } else {
            mail($to, $username, $text, $email);
            $_SESSION['okMessage'] = 'Správa bola úspešne odoslaná';
        }
    } else {
        $username  = $_POST['contactUserame'];
        $email  = $_POST['contactEmail'];

        if(empty($username) && empty($email) && empty($text))
        {
            $_SESSION['errorMessage'] = 'Pre odoslanie otázky je potrebné vyplniť všetky polia';
        } else {
            mail($to, $username, $text, $email);
            $_SESSION['okMessage'] = 'Správa bola úspešne odoslaná';
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: contact.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak 
    -->
    
    <head>
        <link rel='stylesheet' href='layout/styles.css' type='text/css'>
        <link rel='shortcut icon' href='images/favicon.ico'>
        <meta name='viweport' content='width=device-width,initial-scale=1'>
        <meta name='desctiption' content='Lukáš Patrnčiak'>
        <meta name='keywords' content='lukaspatrnciak, lukas, patrnciak, blog'>
        <meta charset='UTF-8'>
        <title>: : Lukáš Patrnčiak : : <?php echo $lang['title_contact']; ?></title>
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class='navigation'>
            <div class='container'>
                <div class='navigationMenu'>
                    <ul>
                        <li><a href='index.php'><?php echo $lang['menu_home']; ?></a></li>
                        <li><a href='index.php#references'><?php echo $lang['menu_index_references']; ?></a></li>
                        <li><a href='contact.php'><?php echo $lang['menu_contact']; ?></a></li>
                        <li><a href='articles.php'><?php echo $lang['menu_articles']; ?></a></li>
                        <li><a href='administration/index.php'><?php echo $lang['menu_administration']; ?></a></li>
                    </ul>
                </div>
                <div class='dropdownLang'>
                    <button class='dropdownLangButton'><?php echo $lang['menu_button']; ?></button>
                    <form class='dropdownLangContent' method='GET'>
                        <input type='submit' name='lang' value='sk'>
                        <input type='submit' name='lang' value='en'>
                        <input type='submit' name='lang' value='de'>
                    </form>
                </div>
                <div class='navigationLogo'>
                    <h1><a href='index.php'>LP</a></h1>
                </div>
            </div>
        </div>
        <!-- pageHeader -->
        <div class='pageHeader'>
            <div class='container'>
                <div class='pageHeaderContent'>
                    <div class='pageHeaderContentLeft'>
                        <h1>Kontakt</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class='content'>
            <div class='container'>
                <div class='contact'>
                    <h1>Kontaktujte ma</h1>
                    <div class='messages'>
                        <?php
                        if(isset($_SESSION['errorMessage']))
                        {
                            echo '<div class="errorMessage">'.$_SESSION['errorMessage'].'</div>';
                            unset($_SESSION['errorMessage']);
                        }
                        elseif(isset($_SESSION['okMessage']))
                        {
                            echo '<div class="okMessage">'.$_SESSION['okMessage'].'</div>';
                            unset($_SESSION['okMessage']);
                        }
                        ?>
                    </div>
                    <div class='contactLeft'>
                        <p><img src="images/icons/name.png">Lukáš Patrnčiak</p>
                        <p><img src="images/icons/number.png">0910505474</p>
                        <p><img src="images/icons/email.png"><a href='mailto:'>mail@lukaspatrnciak.sk</a></p>
                    </div>
                    <div class='contactRight'>
                        <a href='www.facebook.com/LukasPatrnciak' target='_blank'><img src="images/icons/facebook.png"></a>
                        <a href='www.instagram.com/LukasPatrnciak' target='_blank'><img src="images/icons/instagram.png"></a>
                        <a href='www.twitter.com/LukasPatrnciak' target='_blank'><img src="images/icons/twitter.png"></a>
                        <a href='www.linkedin.com/u/LukasPatrnciak' target='_blank'><img src="images/icons/linkedin.png"></a>
                        <a href='www.paypal.me/LukasPatrnciak' target='_blank'><img src="images/icons/paypal.png"></a>
                    </div>
                    <form method='post' class='contactCenter'>
                        <?php
                        if(loggedIn() == false)
                        {
                        ?>
                            <ul>
                                <li><input name='contactUserame' type='text' placeholder='používateľké meno'></li>
                                <li><input name='contactEmail' type='email' placeholder='e-mail'></li>
                                <li><textarea name='contactText' placeholder='správa'></textarea></li>
                                <li><input name='contactSubmit' type='submit' value='Odoslať'></li>
                            </ul>
                        <?php
                        } 
                        elseif(loggedIn() == true)
                        {
                            $username = $_SESSION['username'];

                            $sql = "SELECT * FROM users WHERE username='$username'";
                            $query = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_array($query);

                            $username = $row['username'];
                            $email = $row['email'];
                        ?>
                            <ul>
                                <li>Používateľské meno: <b><?php echo $username; ?></b></li>
                                <li>E-mail: <b><?php echo $email; ?></b></li>
                                <li><textarea name='contactText' placeholder='Sem napíšte Váš odkaz ...'></textarea></li>
                                <li><input name='contactSubmit' type='submit' value='Odoslať'></li>
                            </ul>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>    
        </div>
        <!-- Footer -->
        <div class='footer'>
            <div class='container'>
                <div class='footerContent'>
                    <div class='footerContentLeft'>
                        <h1><?php echo $lang['createdby']; ?></h1>
                        <p><strong>Lukáš Patrnčiak</strong></p>
                    </div>
                    <div class='footerContentRight'>
                        <p>&copy; <?php echo $lang['rights']; ?></p>
                    </div>
                </div>
            </div>    
        </div>
    </body>
</html>