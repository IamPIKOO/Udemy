<?php

# To view info about the server type the following:
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

#App info
    define('APP_NAME', 'Udemy App');
    define('APP_DESC', 'Free and Paid Tutorials');


#Database config
if($_SERVER['SERVER_NAME'] == 'localhost')
{

    // database config for local server
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    //Root path for local server
    define('ROOT', 'http://localhost:8080/udemy/public');

} else {

    // database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysqli');

    //Root path for live server
    define('ROOT', 'https://www.yourwebsite.com');
}