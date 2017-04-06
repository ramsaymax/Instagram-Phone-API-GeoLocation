<?php

require '../src/Instagram.php';

/////// CONFIG ///////
$username = '';
$password = '';
$debug = false;

$photo = '';     // path to the photo
$caption = '';     // caption
//////////////////////

$i = new Instagram($username, $password, $debug);

try {
    $i->login();
} catch (InstagramException $e) {
    $e->getMessage();
    exit();
}

try {
    $i->uploadPhoto($photo, $caption);
} catch (Exception $e) {
    echo $e->getMessage();
}
