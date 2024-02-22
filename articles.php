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

?>

<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: articles.php
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
        <title>: : Lukáš Patrnčiak : : <?php echo $lang['title_articles']; ?></title>
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
                        <h1>Články</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class='content'>
            <div class='container'>
                <div class='articles'>
                    <h1>Články</h1>
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