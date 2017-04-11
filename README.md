# READ ME

**the only dependencies needed for this script is to have  php 5 installed with php-curl, gd and sqlite modules enabled. the firsts two are needed for the instagram library and the last one is needed only if you follow my steps and use** `parser.php` and **not** `parser_from_csv.php`

How to launch it:

 + convert the csv file in a sql db on http://converttosqlite.com/convert/ with these options ![options CSV](http://i.imgur.com/eNWtaiR.png "Options for SQLite Convertitor")
 + open the file `parser.php` and configure it using the params that are in the head of the file, and save the modifications
 + go in the folder where `parser.php` is
 + `php parser.php`
 + wait for the script to finish
 
You will have all the files created by the parser as you specified in the file of the script (under the "configuration" comment)
