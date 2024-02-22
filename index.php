<?php
include ('sql/sql.php');
include ('common.php');
include ('language.php');

// Maintenance Mod
$config_file = 'config.php';

require_once ($config_file);

if($maintenance == '1' && loggedIn() == false) 
{
    header('location: maintenance.php');
}
?>

<html>
    <!--
    == LukasPatrnciak ==
    Filename: index.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak 
    -->
    
    <head>
        <link rel='stylesheet' href='layout/styles.css' type='text/css'>
        <link rel='shortcut icon' href='images/favicon.ico'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name='viweport' content='width=device-width,initial-scale=1'>
        <meta name='desctiption' content='Lukáš Patrnčiak'>
        <meta name='keywords' content='lukaspatrnciak, lukas, patrnciak, blog'>
        <meta charset='UTF-8'>
        <title>: : Lukáš Patrnčiak</title>
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class='navigation'>
            <div class='container'>
                <div class='navigationMenu'>
                    <ul>
                        <li><a href='#about'><?php echo $lang['menu_home_index']; ?></a></li>
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
        <!-- mainHeader -->
        <div class='mainHeader'>
            <div class='headerOpacity'>
                <div class='container'>
                    <div class='headerContent'>
                        <h1>
                        <?php 
                        if(loggedIn() == true)
                        {
                            echo $lang['index_header_h1']; 
                            echo ", <span style='color: #b80c00;'>".$_SESSION['username']."</span>"; 
                        } else {
                            echo $lang['index_header_h1']; 
                        }
                        ?>
                        </h1>
                        <p><?php echo $lang['index_header_p']; ?></p>
                        <p><br></p>
                        <p>
                        <a href='mailto:lukaspatrnciak@outlook.sk'><?php echo $lang['index_header_writeme']; ?></a>
                        </p>
                    </div>
                </div>  
            </div>
        </div>
        <!-- Content -->
        <div class='content'>
            <div class='container'>
                <div id='about'>
                    <h1>O mne</h1>
                    <div class='firstAboutBox'>
                        <h2>Kto som ?</h2>
                        <p>
                        Volám sa <b>Lukáš Patrnčiak</b> a medzi moje hlavné ciele patrí tvorba web stránok. Programovaniu
                        sa venujem už niekoľko rokov, preto taktiež študujem odbor Aplikovaná Informatika na Slovenskej Technickej Univerzite.
                        </p>
                        <p>
                        Medzi moje priority patrí tvorba web stránok, ktoré napĺňajú momentálne štandardy či už po obsahovej alebo vizuálnej stránke.                                
                        </p>
                    </div>
                    <div class='secondAboutBox'>
                        <h2>Programovacie jazyky</h2>
                        <h3>PHP - mierne pokročilý</h3> 
                        <h3>SQL - mierne pokročilý</h3>
                        <h3>HTML / CSS - pokročilý</h3>
                        <h3>Python - začiatočník</h3>
                        <h3>C - začiatočník</h3>
                    </div>
                </div>
                <div id='references'>
                    <h1>Referencie</h1>
                    <?php
                    $dirname = "images/gallery/";
                    $images = glob($dirname."*.png");

                    foreach($images as $image) 
                    {
                        echo '<a href="'.$image.'"><img src="'.$image.'"></a>';
                    }
                    ?>
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