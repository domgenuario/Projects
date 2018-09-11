<!-- 
Dom Genuario
Lab 7
366.02
This will go through a singles file and print out a list of matches that are compatable with the user
-->
<!DOCTYPE html>
<html>
  
<?php include("top.html"); ?> <!-- includes top.html to the top of the page -->

<?php
/* gets the name of the user, then puts each line of singles.txt into an array
then it finds the user's name in singles.txt and sets the info of the user to $user */
$username = $_GET["name"];
$singleUsers = file("singles.txt", FILE_IGNORE_NEW_LINES);
$user = null;
foreach($singleUsers as $single) {
  $single = explode(",", $single);
  if ($single[0] === $username) {
    $user = $single;
  }
}


/* this function checks to see if the gender of any single person is the 
opposite of the user and if it is it returns true, otherwise it returns false 
and this person is not a match */
function gender($match, $user) {
  if ($match[1] != $user[1])
    return true;
  else 
    return false;
}


/* this function checks to see if the age of any single person is within the 
range of ages the user is looking for, it also makes sure the user's age is compatable 
with the random person's range of ages, if they are then it returns true, otherwise
this person is not a match */
function ages($match, $user) {
  if ($match[2] >= $user[5] and $match[2] <= $user[6] and $user[2] >= $match[5]
     and $user[2] <= $match[6])
    return true;
  else
    return false;
}


/* this function checks to see if the user and any single person have the same
favorite OS, if they do then it returns true, otherwise this person is not a match */
function favoriteOS($match, $user) {
  if ($match[4] === $user[4])
    return true;
  else
    return false;
}


/* this function checks to see if the personality of any single user has at 
least one of the same letters in the same corresponding spot as the user,
it takes the personality and then splits the value into an array itself and runs it
through a for loop to check, if they have no letters that are the same in the same corresponding
spot then this person is not a match */
function personality($match, $user) {
  $matchPers = str_split($match[3]);
  $userPers = str_split($user[3]);
  for ($i = 0; $i < 4; $i++) {
    if ($matchPers[$i] === $userPers[$i])
      return true;
  }
}  


/* this function creates an array of all of the matches, it creates an empty
array called arrayOfMatches, then for each single user it checks to see if 
this "possible match" passes all of the functions: gender, ages, favoriteOS, and personality
with the user, if this possible match passes then it will add the match's info to the end of arrayOfMatches 
and calls printMatch() at the end of the function*/
function matches() {
  global $user;
  global $singleUsers;
  $arrayOfMatches = array();
  foreach($singleUsers as $single) {
    $possMatch = explode(",", $single);
    if (gender($possMatch, $user) and ages($possMatch, $user) 
        and favoriteOS($possMatch, $user) and personality($possMatch, $user)) {
      
      array_push($arrayOfMatches, $single);
    }
  }
  printMatch($arrayOfMatches);
}


/* this first splits the matches up into their own arrays called $match,
then prints the user image and the name of the match and underneath it will
print an unordered list of the gender, age, type, and OS */
function printMatch($matches) {
  foreach($matches as $match) {
    $match = explode(",", $match); ?>
  <div class="match">
    <p>
      <img src="images/user.jpg"/>
      <?=$match[0]?>
    </p>
    <ul>
      <li><strong>gender:</strong> <?=$match[1]?></li>
      <li><strong>age:</strong> <?=$match[2]?></li>
      <li><strong>type:</strong> <?=$match[3]?></li>
      <li><strong>OS:</strong> <?=$match[4]?></li>
    </ul>
  </div>
<?php
  }
}
?>

<h1>Matches for <?=$username?></h1>
  
<!-- this calls the function matches() to print the matches -->
<?php matches() ?>


<?php include("bottom.html"); ?> <!-- includes bottom.html at the bottom of the page -->
</html>
