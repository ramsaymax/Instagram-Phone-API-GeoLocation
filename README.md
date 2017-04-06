# READ ME

## download the csv version of the docs
### for both the versions of the script (sqlite/csv)

![download CSV](http://i.imgur.com/9STt0pe.png "How to download CSV")


**the only dependencies needed for this script is to have  php 5 installation with enabled the php-curl, gd and sqlite modules enabled. the firsts two are needed from the instagram library and the last one is needed only if you follow my steps and use** `parser.php` and **not** `parser_from_csv.php`

How to launch it:

 + convert the csv file in a sql db on http://converttosqlite.com/convert/ with these options ![options CSV](http://i.imgur.com/eNWtaiR.png "Options for SQLite Convertitor")
 + open the file `parser.php` and configure it using the params that are in the head of the file, and save the modifications
 + go in the folder where there is `parser.php`
 + `php parser.php`
 + wait for the script to finish
 
You will have all the files created by the parser as you specified in the file of the script (under the "configuration" comment)
