<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '840118252154-vo7dgkfivcjd0mj0b370lal1q9brehoe.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '7XiGwJbdrssoZw4PBwrt4s-G'; //Google CLIENT SECRET
$redirectUrl = 'https://vacxcursion.000webhostapp.com/index1.php';  //return url (url to script)
$homeUrl = 'https://vacxcursion.000webhostapp.com/index1.php';  //return to home



##################################

$gClient = new Google_Client();
$gClient->setApplicationName('API key 1 for login test');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>