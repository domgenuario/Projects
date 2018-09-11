<!-- 
Dom Genuario
Lab 7
366.02
This will thank you for creating an account and offer you to log in to view your matches
and if you do it will take you to matches.php
-->
<!DOCTYPE html>
<html>
<?php include("top.html"); ?> <!-- includes top.html at the top of the page -->

<?php /* gets the name of the user and takes in each post (name, gender, age, etc.)
then skips the first post and sets user equal to itself plus a comma and the value after */
$username = $_POST["name"]; 
$user = $username;
foreach($_POST as $key => $value) {
  if($key != $username)
    $user = $user.",".$value;
}
file_put_contents("singles.txt", $user."\n", FILE_APPEND); //This writes in the new user's info at the bottom of singles.txt
?>

<!-- This is the header thanking the user, then welcomes the user and has a link to matches.php 
so they can log in and view their matches -->
  <h1>Thank You!</h1>
  <p>Welcome to NerdLuv, <?=$username?>! <br/>
    Now <a href="matches.php">log in to see your matches!</a>
  </p>

<?php include("bottom.html"); ?>  <!-- includes bottom.html at the bottom of the page -->
</html>
