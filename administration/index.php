<?php
include ('../sql/mysql.php');
include ('../common.php');
include ('../language.php');

// Maintenance Mod
$config_file = '../config.php';

include ($config_file);

if($maintenance == '1' && loggedIn() == false) 
{
    header('location: ../maintenance.php');
} 

if(isset($_POST['maintenanceButtonA']))
{
    $file = fopen("../config.php", "w") or die("Požadovaný súbor sa nepodarilo nájsť");
    $txt = '<?php $maintenance = 1; ?>';
    fwrite($file, $txt); 
    
    $_SESSION['okMessage'] = "Mód údržby bol úspešne aktivovaný";
    
    fclose($file);
}

if(isset($_POST['maintenanceButtonD']))
{
    $file = fopen("../config.php", "w") or die("Požadovaný súbor sa nepodarilo nájsť");
    $txt = '<?php $maintenance = 0; ?>';
    fwrite($file, $txt); 
    
    $_SESSION['okMessage'] = "Mód údržby bol úspešne deaktivovaný";
    
    fclose($file);
}

if(isset($_POST['registrationButtonA']))
{
    $sql = "SELECT registration FROM config";
    $query = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($query) >= 1)
    {
        $sql = "UPDATE config SET registration=1";
        mysqli_query($connect, $sql);
    } else {
        $sql = "INSERT INTO config(registration) VALUES(1)";
        mysqli_query($connect, $sql);
    }
    
    $_SESSION['okMessage'] = "Registrácia na stránke bola povolená";
}

if(isset($_POST['registrationButtonD']))
{
    $sql = "SELECT registration FROM config";
    $query = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($query) >= 1)
    {
        $sql = "UPDATE config SET registration=0";
        mysqli_query($connect, $sql);
    } else {
        $sql = "INSERT INTO config(registration) VALUES(0)";
        mysqli_query($connect, $sql);
    }
    
    $_SESSION['okMessage'] = "Registrácia na stránke bola zakázaná";
}
?>

<!DOCTYPE HTML>
<html>
    <!--
    == LukasPatrnciak ==
    Filename: /administration/index.php
    Author: Lukas Patrnciak
    www.lukaspatrnciak.sk

    (C) 2018 Lukáš Patrnčiak 
    -->
    
    <head>
        <link rel='stylesheet' href='../layout/styles.css' type='text/css'>
        <link rel='shortcut icon' href='../images/favicon.ico'>
        <meta name='viweport' content='width=device-width,initial-scale=1'>
        <meta name='desctiption' content='Lukáš Patrnčiak'>
        <meta name='keywords' content='lukaspatrnciak, lukas, patrnciak, blog'>
        <meta charset='UTF-8'>
        <?php
        if(loggedIn() == true)
        {
        ?>
        <title>: : Lukáš Patrnčiak : : <?php echo $lang['title_administration']; ?></title>
        <?php
        } else {
        ?>
        <title>: : Lukáš Patrnčiak : : Prihlásenie/Registrácia</title>
        <?php
        }
        ?>
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class='navigation'>
            <div class='container'>
                <div class='navigationMenu'>
                    <ul>
                        <li><a href='../index.php'><?php echo $lang['menu_home']; ?></a></li>
                        <li><a href='../index.php#references'><?php echo $lang['menu_index_references']; ?></a></li>
                        <li><a href='../contact.php'><?php echo $lang['menu_contact']; ?></a></li>
                        <li><a href='../articles.php'><?php echo $lang['menu_articles']; ?></a></li>
                        <li><a href='index.php'><?php echo $lang['menu_administration']; ?></a></li>
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
                        <?php
                        if(loggedIn() == true)
                        {
                        ?>
                        <h1>Administrácia účtu</h1>
                        <?php
                        } else {
                        ?>
                        <h1>Prihlásenie/Registrácia</h1>
                        <?php
                        }
                        ?>
                    </div>
                    <div class='pageHeaderContentRight'>
                        <?php
                        if(loggedIn() == true)
                        {
                            if(user('administrator') == 1)
                            {
                        ?>
                        <h1><span style='color: #ba0000;'>Administrátor</span></h1>
                        <?php
                            } else {
                        ?>
                        <h1><span style='color: #003ea1;'>Bežný účet</span></h1>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class='content'>
            <div class='container'>
                <?php
                if(loggedIn() == true)
                {
                ?>
                <div class='loggedIn'>
                    <h1>Administrácia účtu</h1>
                    <div class='messages'>
                        <?php
                        if(isset($_SESSION['okMessage']))
                        {
                            echo '<div class="okMessage">'.$_SESSION['okMessage'].'</div>';
                            unset($_SESSION['okMessage']);
                        }
                        ?>
                    </div>
                    <?php
                    if(user('administrator') == 1)
                    {
                    ?>
                    <form method='post' class='logout'>
                        <ul>
                            <?php
                            $sql = "SELECT registration FROM config";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_array($result);
                    
                            $registration = $row['registration'];
                    
                            if($maintenance == '0') 
                            {
                            ?>
                            <li><input name='maintenanceButtonA' type='submit' value='Aktivovať mód údržby'></li>
                            <?php
                            } else {
                            ?>
                            <li><input name='maintenanceButtonD' type='submit' value='Deativovať mód údržby'></li>
                            <?php
                            }
                    
                            if($registration == '0') 
                            {
                            ?>
                            <li><input name='registrationButtonA' type='submit' value='Aktivovať registráciu'></li>
                            <?php
                            } else {
                            ?>
                            <li><input name='registrationButtonD' type='submit' value='Deativovať registráciu'></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </form>
                    <?php
                    }
                    ?>
                    <form method='post' class='logout' action='../logout.php'>
                        <ul>
                            <li><input name='logoutButton' type='submit' value='Odhlásiť sa'></li>
                        </ul>
                    </form>
                </div>
                <?php
                } else {
                ?>
                <div class='loginRegister'>
                    <form method='post' class='login' action='../login.php'>
                        <h1>Prihlásenie</h1>
                        <div class='messages'>
                            <?php
                            if(isset($_SESSION['errorMessage']))
                            {
                                echo '<div class="errorMessage">'.$_SESSION['errorMessage'].'</div>';
                                unset($_SESSION['errorMessage']);
                            }
                            ?>
                        </div>
                        <ul>
                            <li><input name='loginUsername' type='text' placeholder='používateľské meno'></li>
                            <li><input name='loginPassword' type='password' placeholder='heslo'></li>
                            <li><input name='loginButton' type='submit' value='Prihlásiť sa'></li>
                        </ul>
                    </form>
                    <?php
                    $sql = "SELECT registration FROM config";
                    $result = mysqli_query($connect, $sql);
                    $row = mysqli_fetch_array($result);
                    
                    $registration = $row['registration'];
                    
                    if($registration == 1 || mysqli_num_rows($result) == 0)
                    {
                    ?>
                    <form method='post' class='register' action='../register.php'>
                        <h1>Registrácia</h1>
                        <ul>
                            <li><input name='registerUsername' type='text' placeholder='používateľské meno *'></li>
                            <li><input name='registerName' type='text' placeholder='meno'></li>
                            <li><input name='registerSurname' type='text' placeholder='priezvisko'></li>
                            <li><input name='registerEmail' type='email' placeholder='email *'></li>
                            <li><input name='registerPassword' type='password' placeholder='heslo **'></li>
                            <li><input name='registerRePassword' type='password' placeholder='zopakovať heslo **'></li>
                            <li><input name='registerButton' type='submit' value='Registrovať sa'></li>
                            <li><br></li>
                            <li>* - povinne vyplnené polia</li>
                            <li>** - heslo musí obsahovať minimálne 8 znakov</li>
                            <li>   - používateľské meno môže obsahovať najviac 8 znakov</li>
                        </ul>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }
                ?>
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