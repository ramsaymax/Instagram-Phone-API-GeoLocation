<?php
require 'vendor/mgp25/instagram-php/src/Instagram.php';
// =================
// = Configuration =
// =================
$username = '';
$password = '';
$path_to_db_file = 'insta_accounts.sqlite';
$path_to_file_of_results = 'results.csv';
$path_to_file_of_userid_made = 'userids_made.csv';
$path_to_file_of_errors = 'errors.csv';
$path_to_file_of_private_accounts = 'private_accounts.csv';
$debug = false;

// =================
// =   Program    =
// =================
$i = new Instagram($username, $password, $debug);
$db = new SQLite3($path_to_db_file);

// pid of the process
$pid_file = fopen('insta_parser.pid', 'w+');
fwrite($pid_file, getmypid());
fclose($pid_file);

// Files
$fresults = fopen($path_to_file_of_results, 'a+');
$fusersmade = fopen($path_to_file_of_userid_made, 'a+');
$ferr = fopen($path_to_file_of_errors, 'w+');
$fnotauth = fopen($path_to_file_of_private_accounts, 'a+');


$count = $db->query("SELECT COUNT(*) FROM accounts WHERE Instagram_Username != 'done'");
$total = $count->fetchArray(SQLITE3_NUM)[0];
echo "remained: {$total}\n";

$results = $db->query("SELECT Instagram_Username, Instagram_ID FROM accounts WHERE Instagram_Username != 'done'");

while ($row = $results->fetchArray(SQLITE3_NUM)) {
    try {
        $prova = $i->login();
    } catch (InstagramException $e) {
        $e->getMessage();
        print_r($e);
    }
    try {
        fputcsv($fusersmade, array($row[1]));
        $us = $i->getGeoMedia($row[1]);
        echo "$us";
        foreach ($us['geo_media'] as $geo_media) {
           fputcsv($fresults, array($row[0], $row[1], $geo_media['lat'],$geo_media['lng']));
        }
        $db->query("UPDATE accounts SET Instagram_Username = 'done' WHERE Instagram_Username == '{$row[0]}'");
    } catch (Exception $e) {
        if($e->getMessage() == "Not authorized to view user\n") {
          fputcsv($fnotauth, array($row[1]));
        } else {
          fputcsv($ferr, array($row[1]));
        }
    }
}

fclose($fresults);
fclose($ferr);
fclose($fnotauth);
fclose($fusersmade);

print_r("done!relauch if there are userids with errors in {$path_to_file_of_errors}");
