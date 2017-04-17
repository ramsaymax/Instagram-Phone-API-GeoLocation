![N|Solid](https://github.com/mgp25/Instagram-API/raw/master/examples/assets/instagram.png)

# Instagram location from Geo Data


This script uses Instagram's unofficial private phone API to pull Lat/Long for a designated list of Instagram accounts, and determines the creator's country of origin based on their geographical upload frequency in a given area. 

  - Lat/Long is not available via the official Instagram API
  - Instagram's API is notoriously locked down, hence the use of the phone API
  - Thanks to MGP25 and his work on the actual API - https://github.com/mgp25/Instagram-API

### Dependencies

 - You'll need php 5 installed with php-curl - http://php.net/manual/en/install.macosx.php
 - You'll need gd and sqlite modules enabled
 - the firsts two are needed for the instagram library and the last one is needed only if you follow my steps and use parser.php and not parser_from_csv.php

### How to launch it
This script requires [PHP 5](http://www.php.net/) v5+ to run.

1. Clone the Repository
```sh
$ git clone https://github.com/ramsaymax/Instagram-Phone-API-GeoLocation.git
```
2. If your list of instagram accounts is very large, you'll want to convert the CSV to a sql db on http://converttosqlite.com/convert/ with these options 

![options CSV](http://i.imgur.com/eNWtaiR.png "Options for SQLite Converter")

3. open the file `parser.php` and configure it using the params that are in the head of the file, and save the modifications

4. cd into the repository, where `parser.php` is located
```sh
$ cd Instagram-Phone-API-GeoLocation
```
5. Run the script with:
```sh
$ php parser.php
```
6. wait for the script to finish

You will have all the files created by the parser as you specified inside the file of the script (under the "configuration" comment)
