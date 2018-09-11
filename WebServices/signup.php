<!-- 
Dom Genuario
Lab 8
366.02
This is where a new user signs up and fills out his/her information
which then takes you to signup-submit.php
-->
<!DOCTYPE html>
<html>
<?php include("top.html"); ?> <!-- includes top.html to the top of the page -->
  
<form action="signup-submit.php" method="post"> <!-- sets the form to post and once you hit sign up it takes you to signup-submit.php -->
 <fieldset>
  <legend>New User Signup</legend> <!-- caption of the box -->
   
    <ul>
      <li>
        <!-- asks for your name with a text box of size 16 -->
        <strong>Name:</strong> <input type="text" name="name" size="16" />
      </li>
      
      <li>
        <!-- asks for your gender with the option of checking M for male or F for female
            and you can only check one -->
        <strong>Gender:</strong> <label> <input type="radio" name="gender" value="M"/>Male</label>
        <label> <input type="radio" name="gender" value="F" />Female</label>
      </li>
      
      <li>
        <!-- asks for your age with a text box of size 6 and a maxlength of 2 -->
        <strong>Age:</strong> <input type="text" name="age" size="6" maxlength="2" />
      </li>
      
      <li>
        <!-- asks for your personality type with a text box of size 6 and maxlength of 4
            if you don't know your type then you can click on the link which will take you to a site
            for you to take a personality test -->
        <strong>Personality Type:</strong> <input type="text" name="type" size="6" maxlength="4" />
        <a href="http://www.humanmetrics.com/cgiwin/JTypes2.asp">(Don't Know your own type?)</a>
      </li>
      
      <li>
        <!-- asks for your favority OS with 3 options to choose from and it has "Windows" initially selected -->
        <strong>Favorite OS:</strong> 
        <select name="OS">
          <option selected = "selected">Windows</option>
          <option>Mac OS X</option>
          <option>Linux</option>
        </select>
      </li>
      
      <li>
        <!-- asks for your range of ages to set, the first text box is size 6 with maxlength of 2
            and this is where you put your minimum age and the second box is the same where you would
            put your maximum age -->
        <strong>Seeking age:</strong> 
        <input type="text" name="minage" size="6" maxlength="2" value="min">
        to
        <input type="text" name="maxage" size="6" maxlength="2" value="max">
      </li>
      
      <!-- once you filled out all of the requirements it asks you for you can hit 
            the "Sign Up" button which will take you to signup-submit.php -->
      <input type="submit" value="Sign Up">
    
   </ul>
  </fieldset>
</form>
  
<?php include("bottom.html"); ?> <!-- includes bottom.html at the bottom of the page -->
</html>
