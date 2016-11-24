<?php

/*
   Template Name: Special Layout
*/

get_header();

  if (have_posts()) :
    while (have_posts()) : the_post(); ?>

      <article class="post page">
         <h2><?php the_title(); ?></h2>

         <div class="info-box">
            <h4>Disclaimer Title</h4>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            </p>
         </div>
         <?php the_content(); ?>
      </article>

    <?php endwhile;

  else :
    echo "<p>No Content!</p>";

  endif;

get_footer();

?>
