<?php
require 'vendor/mgp25/instagram-php/src/Instagram.php';
// =================
// = Configuration =
// =================
$username = '';
$password = '';
$path_to_the_source_file = '17k_New.csv';
$lines_to_read = 106000; // CHANGE THIS FOR DECIDE HOW MANY RECORDS TO READ (put the exact number of lines of the source file or a partial if you want to just to test it)
$path_to_file_of_results = 'results.csv';
$path_to_file_of_userid_made = 'userids_made.csv';
$path_to_file_of_errors = 'errors.csv';
$path_to_file_of_private_accounts = 'private_accounts.csv';
$debug = false;

// =================
// =   Program    =
// =================
$fp = fopen('file.csv', 'a+');
$fusersmade = fopen('file_users_made.csv', 'a+');
$ferr = fopen('file_with_errors.csv', 'a+');
$fnotauth = fopen('file_with_not_authorized.csv', 'a+');

$accounts = fopen($path_to_the_source_file, 'r+');
$i = new Instagram($username, $password, $debug);

// READ CSV FILE
$users = array();
while (!feof($accounts)) {
  array_push($users, fgetcsv($accounts, 2048));
}
fclose($accounts);

// CHOOSE THE NUMBER OF LINES TO READ
$counter = 0; 

$users_to_read = array();
while ($counter < $lines_to_read) {
  array_push($users_to_read, $users[$counter]);
  array_shift($users);
  $counter++;
}

echo "lines to parse: ";
echo count($users_to_read);
echo "\n";

foreach ($users_to_read as $user) {
  try {
      $prova = $i->login();
  } catch (InstagramException $e) {
      $e->getMessage();
      print_r($e);
  }
  try {
      fputcsv($fusersmade, array($user[1]));
      echo "test";
      $us = $i->getGeoMedia($user[1]);

      foreach ($us['geo_media'] as $geo_media) {
         fputcsv($fp, array($user[0],$user[1],$geo_media['lat'],$geo_media['lng']));
      }
  } catch (Exception $e) {
      if($e->getMessage() == "Not authorized to view user\n") {
        fputcsv($fnotauth, array($user[1]));
      } else {
        fputcsv($ferr, array($user[1]));
      }
  }
}


fclose($fp);
fclose($ferr);
fclose($fnotauth);
fclose($fusersmade);

print_r("done!relauch if there are userids with errors in {$path_to_file_of_errors}");
