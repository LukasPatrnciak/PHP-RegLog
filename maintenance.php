<?php
include ('sql/mysql.php');
include ('common.php');
include ('language.php');

// Maintenance Mod
$config_file = 'config.php';

require_once ($config_file);

if($maintenance == '0' && loggedIn() == false && user('admin') == 0) 
{
    header('location: index.php');
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>:: Lukáš Patrnčiak :: <?php echo $lang['maintenance_title']; ?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
	    <meta charset='UTF-8'>	
        <link href='layout/styles.css' rel='stylesheet'>
		<link href='layout/stylesM.css' rel='stylesheet'>
    </head>
    <body>
        <div class='contentBg'>
            <div class='contentBgShadow'>
                <!-- Navigation Bar -->
                <div class='navigation'>
                    <div class='container'>
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
                <div class='contentM'>
                    <div class='container'>
                        <div class='contentContainerM'>
                            <h1><?php echo $lang['maintenance_h1']; ?></h1>
                            <p><?php echo $lang['maintenance_p']; ?></p>
                            <p><strong><a href='mailto: lukaspatrnciak@outlook.sk'>e-mail</a></strong></p>
                            <form method='post' action='login.php' class='contentLoginM'>
                                <input name='loginUsername' type='text' placeholder='<?php echo $lang['maintenance_login_username']; ?>'>
                                <input name='loginPassword' type='password' placeholder='<?php echo $lang['maintenance_login_password']; ?>'>
                                <input name='loginButton' type='submit' value='<?php echo $lang['maintenance_login_submit']; ?>'>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='socialNetworksM'>
                    <div class='container'>
                        <div class='socialNetworksMCenter'>
                            <a href='http://www.facebook.com/LukasPatrnciak'><img src='images/icons/facebook.png' width='30' height='30'></a>
                            <a href='http://www.twitter.com/LukasPatrnciak'><img src='images/icons/twitter.png' width='30' height='30'></a>
                            <a href='http://www.instagram.com/LukasPatrnciak'><img src='images/icons/instagram.png' width='30' height='30'></a>
                            <a href='http://www.linkedin.com/in/LukasPatrnciak'><img src='images/icons/linkedin.png' width='30' height='30'></a>
                            <a href='http://www.paypal.me/LukasPatrnciak'><img src='images/icons/paypal.png' width='30' height='30'></a>
                        </div>
                    </div>
                </div>
                <div class='footerM'>
                    <div class='container'>
                        <p>&copy; 2019 | <?php echo $lang['maintenance_footer']; ?> <strong><a href='maintenance.php'>Lukáš Patrnčiak</a></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>