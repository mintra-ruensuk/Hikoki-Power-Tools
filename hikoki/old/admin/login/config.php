<?php
//Pull '$base_url' and '$signin_url' from this file
include 'globalcon.php';

//DATABASE CONNECTION VARIABLES
// $host = "wh-db06.csloxinfo.com"; // Host name
// $username = "hitachi_web"; // Mysql username
// $password = '$hitachiweb'; // Mysql password
$db_name = "hitachi_web"; // Database name
$tbl_name = "users"; // Table name

$host = "localhost:3307"; // Host name
$username = "root"; // Mysql username
$password = ''; // Mysql password
$db_name = "hitachi_web"; // Database name



//Set this for global site use
$site_name = 'Hitachi Power Tools';

//ONLY set this if you want a moderator to verify users and not the users themselves, otherwise leave blank or comment out
$admin_email = 'mintra.ruensuk@gmail.com';

//EMAIL SETTINGS
//SEND TEST EMAILS THROUGH FORM TO https://www.mail-tester.com GENERATED ADDRESS FOR SPAM SCORE
$from_email = 'mintra.ruensuk@gmail.com'; //Webmaster email
$from_name = 'Hitachi Power Tools'; //"From name" displayed on email

//Find specific server settings at https://www.arclab.com/en/kb/email/list-of-smtp-and-pop3-servers-mailserver-list.html
$mailServerType = 'smtp';
//IF $mailServerType = 'smtp'
$smtp_server = 'smtp.gmail.com';
$smtp_user = 'mintra.ruensuk@gmail.com';
$smtp_pw = 'ancpjhsbkibabpxe';
$smtp_port = 465; //465 for ssl, 587 for tls, 25 for other
$smtp_security = 'ssl';//ssl, tls or ''

//HTML Messages shown before URL in emails (the more
$verifymsg = 'Click this link to verify your new account!'; //Verify email message
$active_email = 'Your new account is now active! Click this link to log in!';//Active email message
//LOGIN FORM RESPONSE MESSAGES/ERRORS
$signupthanks = 'Thank you for signing up! You will receive an email shortly confirming the verification of your account.';
$activemsg = 'Your account has been verified! You may now login at <br><a href="'.$signin_url.'">'.$signin_url.'</a>';

//DO NOT TOUCH
//Unsets $admin_email based on various conditions (left blank, not valid email, etc)
if(trim($admin_email, ' ') == ''){
	unset($admin_email);
}
elseif(!filter_var($admin_email, FILTER_VALIDATE_EMAIL) == true ){
	unset($admin_email);
	echo $invalid_mod;
};
?>
