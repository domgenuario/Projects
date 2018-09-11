<!-- 
Dom Genuario
Lab 8
366.02
This will call a web service to get matches from a database and print out a list of matches that are compatable with the user
-->

<!DOCTYPE html>
<html>
  
<?php include("top.html"); ?> <!-- includes top.html to the top of the page -->

  
<!-- this will call nerdluv.php using GET and do a file_get_contents to receive the matches -->
<?php
$username = $_GET["name"];
$getData = http_build_query(
  array(
    'name' => $username
    )
  );

$options = array('http' =>
  array(
    'method' => 'GET'
  )
);
  
$context = $stream_context_create($options);
$result = file_get_contents('http://djgenuar.millersville.edu/Lab8/matches-submit.php?'.$getData, false, $context);
printMatch($result);

/* this prints the user image and the name of the match and underneath it will
print an unordered list of the gender, age, type, and OS */
function printMatch($matches) {
  foreach($matches as $match) { ?>
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

<?php include("bottom.html"); ?> <!-- includes bottom.html at the bottom of the page -->
</html>
