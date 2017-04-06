# READ ME

## DOWNLOAD THE CSV VERSION OF THE DOCS
### for both the versions of the script (sqlite/csv)

![download CSV](http://i.imgur.com/9STt0pe.png "How to download CSV")


**THE ONLY DEPENDENCIES NEEDED FOR THIS SCRIPT IS TO HAVE  PHP 5 INSTALLATION WITH ENABLED THE PHP-CURL, GD AND SQLITE MODULES ENABLED. THE FIRSTS TWO ARE NEEDED FROM THE INSTAGRAM LIBRARY AND THE LAST ONE IS NEEDED ONLY IF YOU FOLLOW MY STEPS AND USE** `parser.php` and **not** `parser_from_csv.php`

How to launch it:

 + convert the csv file in a sql db on http://converttosqlite.com/convert/ with these options ![options CSV](http://i.imgur.com/eNWtaiR.png "Options for SQLite Convertitor")
 + open the file `parser.php` and configure it using the params that are in the head of the file, and save the modifications
 + go in the folder where there is `parser.php`
 + `php parser.php`
 + wait for the script to finish
 
You will have all the files created by the parser as you specified in the file of the script (under the "configuration" comment)
