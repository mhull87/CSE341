<?php
/*****************************************
 * File: dbConnect.php
 * Author: Br. Burton
 * 
 * Description: Shows how to connect with Heroku credentials.
 ******************************************/

 function get_db()
 {
   $db = NULL;

   try
   {
    //default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    //get the various parts of the DB Connection from the URL
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    //create the PDO connection
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort,dbname=$dbName", $dbUser, $dbPassword);

    //this line makes PDO give us an exception when there are problems, and can be very helpful with debugging
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch (PDOException $ex)
   {
     //if this were in production, you would not want to echo the details of the exception.
     echo "Error connecting to DB. Details: $ex";
     die();
   }
   return $db;
 }
?>