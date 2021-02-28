<?php
/**
 * Created by PhpStorm.
 * User: hm
 * Date: 8/3/2020
 * Time: 6:14 PM
 */

require_once "connect.php";

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
}

if(@$_SESSION['access_token']) {
    header("location:index.php");
}else {
    echo "Authentication Failed Try Again";
}