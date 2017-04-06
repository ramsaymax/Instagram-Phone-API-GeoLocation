# READ ME

For covenience, and because it is easier work with a db that with a CSV file, I have converted the file CSV you gave me in a Sqlite file ('http://converttosqlite.com/convert/'). (I have put it in the repo the SQLite version of the spreadsheet you've sent me, it is named insta_accounts.sqlite).

If you prefer to use the CSV, you can follow the same instructions down here, but changing any occurence of `parser.php` with `parser_from_csv.php`, and skipping the conversion (first) step.

## DOWNLOAD THE CSV VERSION OF THE DOCS
### for both the versions of the script (sqlite/csv)

![download CSV](http://i.imgur.com/9STt0pe.png "How to download CSV")


**THE ONLY DEPENDENCIES NEEDED FOR THIS SCRIPT IS TO HAVE A PHP 5 OR SUPERIOR INSTALLATION WITH ENABLED THE PHP-CURL, GD AND SQLITE MODULES ENABLED. THE FIRSTS TWO ARE NEEDED FROM THE INSTAGRAM LIBRARY AND THE LAST ONE IS NEEDED ONLY IF YOU FOLLOW MY STEPS AND USE** `parser.php` and **not** `parser_from_csv.php`

How to lunch it:

 + convert the csv file in a sql db on http://converttosqlite.com/convert/ with these options ![options CSV](http://i.imgur.com/eNWtaiR.png "Options for SQLite Convertitor")
 + open the file `parser.php` and configure it using the params that are in the head of the file, and save the modifications
 + go in the folder where there is `parser.php`
 + `php parser.php`
 + wait for it finish
 
You will have all the files created by the parser as you specified in the file of the scripts (under the "configuration" comment)