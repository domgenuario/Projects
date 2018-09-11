<!-- 
Dom Genuario
Lab 7 
366.02
This will ask for a returning user to sign in, once you sign in and hit view my 
matches, it will take you to matches-submit.php so you can view your matches 
-->
<!DOCTYPE html>
<html>
<?php include("top.html"); ?> <!-- includes top.html at the top of the page -->

<!-- sets form to get -->
<form action="matches-submit.php" method="get">
  <fieldset>
    <legend>Returning User</legend> <!-- caption of the box -->
    <ul>
      <!-- asks for the users name with a type text and the size of the text box is 16 -->
      <li><strong>Name:</strong> <input type="text" name="name" size="16"></li>
    </ul>
    <input type="submit" value="View My Matches"> <!-- this is the submit button that says "View My Matches" -->
  </fieldset>
</form>
  
<?php include("bottom.html"); ?> <!-- includes bottom.html at the bottom of the page -->
</html>
