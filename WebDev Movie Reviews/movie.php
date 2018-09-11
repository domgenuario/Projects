<!-- 
Dom Genuario
366.02
Lab6
This will allow you to generate reviews for a variety of movies
-->

<!DOCTYPE html>
    
<html>
  
      <?php

        /* $movie is a parameter that takes in the movie
        $info will take in the movies information (name of film and year)
        $overview will take in the movie information to be placed in the general overview section 
        $numOfReviews we set to 0, this will later represent the number of reviews there are for each film */

        $movie = $_GET["film"];
        $info = file($movie."/info.txt", FILE_IGNORE_NEW_LINES);
        $overview = file($movie."/overview.txt");
        $numOfReviews = 0;
    ?>

    <head>

        <title>Rancid Tomatoes</title>

        <meta charset="utf-8" />

        <link href="movie.css" type="text/css" rel="stylesheet" />

    </head>
  
      <body>

        <div id="rancidTomatoes">

            <img src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/banner.png" alt="Rancid Tomatoes" />

        </div>

       <!-- This will print out the movie name and the year in parenthesis -->
        <h1><?= $info[0] ?>(<?= $info[1]?>) </h1>
      
      <div class="bodyInfo">
          <div  class="generalOverview">

            <img src=<?=$movie?>/overview.png alt="general overview" />

        <dl>
            
          <!-- This explodes the overview up from each ":" and then prints <dt> then <dd> -->
             <?php
                  global $overview;
                foreach ($overview as $line) {
                      $line = explode(":", $line); ?>
                      <dt><?= $line[0] ?></dt>
                      <dd><?= $line[1] ?></dd>
          <?php } ?>
          
        </dl>

        </div> <!-- general overview -->
        
        <div id="review">

              <div class="rotten">
                
                    <!-- This checks to see if the overall rating is above a 60 and if it is then 
                    it will print a freshbig.png image, otherwise it will print a rottenbig.png image -->
                
                    <?php
                        if ($info[2] >= 60) {
                    ?>        <img src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/freshbig.png" alt="Fresh" />
                
                    <?php
                        } else {
                    ?>         <img src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/rottenbig.png" alt="Rotten" />
                    <?php } ?>
                
                        <?= $info[2] ?>
                
              </div> <!-- rotten -->

          <!-- First it grabs all of the files that end with review.txt
        then it sets $numOfRevies to the total amount of reviews. Then it will split each individual
        review up -->
            
          
        <?php 
                $reviews = glob($movie."/review*.txt");
                global $numOfReviews;
                $numOfReviews = count($reviews);
                foreach ($reviews as $review) {
                    $review = file($review, FILE_IGNORE_NEW_LINES); 
          ?>
          
          <!-- Here it checks to see if the review was a good review or a bad review, if it was 
                a good review it will print a fresh.gif and if it was a bad review it will print
                a rotten.gif, then it will print the quote beside the .gif -->
          
              <div class="review1">   
                <?php 
                    if ($review[1] == "FRESH") { ?>
                         <img src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/fresh.gif" class="headericon" alt="Fresh" />
                  <?php
                    } else { ?>
                          <img src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/rotten.gif" class="headericon" alt="Rotten" />
                <?php } ?>
            
                    <q> <?= $review[0] ?> </q>
          </div> <!-- review1 -->
          
          <!-- This will print the critic icon and then the name of the reviewer. Then after a line 
                break it will print the publication -->
          
                <p class="name">

                      <img class="critic" src="http://cs.millersville.edu/~sschwartz/366/HTML_CSS_Lab/Images/critic.gif" alt="Critic" />

                       <?= $review[2] ?>  <br />

                    <em> <?= $review[3] ?> </em>

                </p>
            
          <?php 
                } ?>
          
            
        </div> <!-- review -->
        
        <!-- This will print 1 to however many reviews there are of the movie -->
        
        <p class="page">(1-<?=$numOfReviews?>) of <?=$numOfReviews?></p>
        
      </div> <!-- body info -->
      
      <div class="w3">

            <a href="http://validator.w3.org/check/referer"><img src="http://cs.millersville.edu/~sschwartz/366/Images/w3c-html.png" alt="Valid HTML5" /></a> <br />

            <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://cs.millersville.edu/~sschwartz/366/Images/w3c-css.png" alt="Valid CSS" /></a>

       </div>
      
    </body>



</html>
