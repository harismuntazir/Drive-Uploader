<?php
session_start();
require_once "GoogleAPI/vendor/autoload.php";
$client = new Google_Client();
// Get your credentials from the console
$client->setClientId('801963837949-vq2tlfadofdhmgc4gte7nloisgkll61k.apps.googleusercontent.com');
$client->setClientSecret('fGEEVO_vacNUX_bdZd31Xu9F');
$client->setApplicationName('Informer');
$client->setScopes(Google_Service_Drive::DRIVE);
$client->setRedirectUri('https://driveupoader.herokuapp.com/getCode.php');
?>
