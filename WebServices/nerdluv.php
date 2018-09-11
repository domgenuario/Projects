<?php
header("Content-type: application/json");
/* This web service should handle two types of requests:
    1) a GET request with a name parameter 
    2) a POST request with the following parameters:
        - name
        - gender
        - age
        - ptype
        - os
        - minage
        - maxage
    You do not need to do validation checking on the values of the parameters.
    For this lab, we'll assume the values are all valid (no weird OS spellings, etc.)
    
    There are no results from the POST request. However, if a failure occurs, your
    page should return an HTTP error code of 400.
    
    The results of the GET request should be a json object named data with the set
    of matches as an array. For example:
    {"data":[{"name":"Dana Scully",
              "gender":"F",
              "age":"41",
              "type":"ISTJ",
              "os":"Mac OS X",
              "minage":"36",
              "maxage":"54"},
             {"name":"Jadzia Dax",
              "gender":"F",
              "age":"46",
              "type":"ENFJ",
              "os":"Mac OS X",
              "minage":"18",
              "maxage":"32"}
             ]
    }
    
    If no matches are found, return an empty data array (as follows):
    {"data":[]
    }
    If a failure occurs, your page should return an HTTP error code of 400.


/* Your db.txt file should contain two variable initializations:
    $username (probably "root", your db username)
    $login (the password for your db login) */
include("db.txt");
$dbInfo = file("db.txt", FILE_IGNORE_NEW_LINES);
$username = $dbInfo[0];
$login = $$dbInfo[1];

/* You should put logic here to handle the POST request to add a new 
user and the GET request to get matches for a user */

$name = $gender = $age = $type = $os = $minage = $maxage = "";
if ($_SERVER["REQUEST_METHOD" == "POST") {
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $type = $_POST["type"];
  $os = $_POST["os"];
  $minage = $_POST["minage"];
  $maxage = $_POST["maxage"];
  $dbConnection = getConnection($username, $login);
  $addPerson = addUser($dbConnection, $name, $gender, $type, $os, $minage, $maxage);
  
} else {
  $name = $_GET["name"];
  $dbConnection = getConnection($username, $login);
  $userInfo = getUser($dbConnection, $name);
  $basicMatches = getBasicMatches($dbConnection, $userInfo);
  $getMatches = getMatches($userInfo[2], $basicMatches);
}
             
             
  

/* This function should take in the $username and $login that were initialized
    in the db.txt file and it should use PDO to connect to the database.
    The database connection should be returned. */
function getConnection($username, $login) {
  $db = new PDO("mysql:dbname=Lab8;host=localhost",$username, $login); 
  return $db;
}

/* This function takes in a PDO object that should already be connected to 
    the database and a variable $name that contains the user name. $name is the
    user for whom we want to find matches. This function should do a query (using 
    a prepared statement) and get the row that matches the $name as a *numerically
    indexed* array. This array should be returned. */
function getUser($dbconn,$name) {
  $statement = $dbconn->prepare("SELECT * FROM users WHERE name = :name")
  $statement->execute(array(':name' => $name));
  $row = $statment->fetchAll();
  return $row;
}

/* Given a PDO object (already connected to DB) and a numerically indexed array of data
    representing the row in the db for a user, return a result set of data that has
    1) the opposite gender from $user, 2) matching os, 3) an age between the minage of $user
    and maxage of $user. (Ignore the personality type for now). Getting these results should be
    done by a prepared statement with parameters. Return the rows in a multi-dimensional 
    *associative* array (unless there are no results) */
function getBasicMatches($dbconn,$user) {
    $statement = $dbconn->prepare("SELECT * FROM users WHERE gender <> $user[1] AND OS = $user[4]
                                AND minage <= $user[5] AND maxage >= $user[6]");
      $statement->execute();
      $rows = $statement->fetchAll();
      foreach($row in $rows) {
      $data = {"data":[{"name": $row[0],
              "gender":$row[1],
              "age":$row[2],
              "type":$row[3],
              "os":$row[4],
              "minage":$row[5],
              "maxage":$row[6]},
             ]
        }
    }
      if ($rows == null)
      {"data":[]};
    
    return $data;
}

/* Given the string representing the user's personality type and the result set from
    getting the user's basic matches (getBasicMatches), return an array containing only those
    matches that have at least one personality type letter in common with $usertype The $matches
    should be multi-dimensional associative array when passed in, and the return value should
    also be a multi-dimensional associative array (unless there are no results) */
function getMatches($usertype, $matches) {
    $matchArray = array();
    $user = str_split($usertype);
    foreach ($matches as $match) {
        $matchPers = str_split($matches[3]);
        for ($i = 0; $i < 4; $i++) {
            if ($matchPers[$i] === $user[$i]) {
                array_push($matchArray, $match);
            }
        }
    
    }
    
    return $matchArray;
    
}

/* Given a PDO object (already connected to DB) and all of the information necessary for
    a new user, this function should add the new user to the database. Return value should be
    true or false */
function addUser($dbconn, $name, $gender, $age, $ptype, $os, $minage, $maxage) {
  if () 
    return false;
    
  $statement = $dbconn->prepare("INSERT INTO users values($name,$gender,$age,$ptype,$os,$minage,$maxage)");
  $statement->execute();
  return true;
}

?>
