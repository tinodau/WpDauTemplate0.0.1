<form class="" role="search" action="<?php echo home_url('/'); ?>" id="searchform" method="get">
   <div class="">
      <label class="screen-reader-text" for="s"></label>
      <input type="text" name="s" value="" id="s" placeholder="<?php the_search_query(); ?>">
      <input type="submit" value="Search" id="searchsubmit">
   </div>
</form>
