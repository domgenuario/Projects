<!-- 
Dom Genuario
Lab 8
366.02
This will thank you for creating an account and offer you to log in to view your matches
and if you do it will take you to matches.php
-->
<!DOCTYPE html>
<html>
<?php include("top.html"); ?> <!-- includes top.html at the top of the page -->

<?php /* gets the name of the user and takes in each post (name, gender, age, etc.)
then calls the web service by using POST and does a file_get_contents to add the new user */


$name = $_POST["name"];
$gender = $_POST["gender"];
$type = $_POST["type"];
$os = $_POST["os"];
$minage = $_POST["minage"];
$maxage = $_POST["maxage"];
$url = 'http://djgenuar.millersville.edu/Lab8/nerdluv.php?';
$getData = http_build_query(
  array(
    'name' => $name,
    'gender' => $gender,
    'type' => $type,
    'os' => $os,
    'minage' => $minage,
    'maxage' => $maxage
  )
);

$options = array(
  'http' => array(
    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
    'method' => 'POST',
    'content' => $getData
  )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

?>

<!-- This is the header thanking the user, then welcomes the user and has a link to matches.php 
so they can log in and view their matches -->
  <h1>Thank You!</h1>
  <p>Welcome to NerdLuv, <?=$name?>! <br/>
    Now <a href="matches.php">log in to see your matches!</a>
  </p>

<?php include("bottom.html"); ?>  <!-- includes bottom.html at the bottom of the page -->
</html>
