<?php

   function dautemplate_resources() {
      wp_enqueue_style('style', get_stylesheet_uri());
   }

   add_action('wp_enqueue_scripts', 'dautemplate_resources');

  // Get Top Ancestor
   function get_top_ancestor_id(){

      global $post;

      if ($post->post_parent) {
         $ancestors = array_reverse(get_post_ancestors( $post->ID ));
         return $ancestors[0];
      };

      return $post->ID;
   };

   // '->'  = have
   //  $    = variable

   // HAVE CHILDREN ?
   function has_children(){
      global $post;

      $pages = get_pages( 'child_of=' . $post->ID);
      return count($pages);
   }


   // CUSTOMIZE EXCERPT WORD COUNT
   function custom_excerpt_length(){
      return 30;
   }
   add_filter('excerpt_length', 'custom_excerpt_length');


   // THEME SETUP
   function dautemplate_setup(){
      // Navigation Menu
      register_nav_menus( array(
        'primary' => __('Primary Menu'),
        'footer'  => __('Footer Menu'),
     ));

      // ADD FEATURED IMAGE SUPPORT
      add_theme_support( 'post-thumbnails' );
      add_image_size('small-thumbnail', 180, 150, false);
      add_image_size('banner-image', 500, 390, false);

      // ADD POST FORMAT SUPPORT
      add_theme_support( 'post-formats', array('aside', 'gallery', 'link') );
   }

   add_action('after_setup_theme', 'dautemplate_setup');


   // ADD WIDGET LOCATION
   function ourWidgetInit(){
      register_sidebar( array(
         'name'   => 'Sidebar',
         'id'     => 'sidebar1',
         'before_widget'   => '<div class="widget-item">',
         'after_widget'    => '</div>',
         'before_title'    => '<h4 class="my-special-class">',
         'after_title'     => '</h4>'
      ));

      register_sidebar( array(
         'name'   => 'Footer Area 1',
         'id'     => 'footer1'
      ));

      register_sidebar( array(
         'name'   => 'Footer Area 2',
         'id'     => 'footer2'
      ));

      register_sidebar( array(
         'name'   => 'Footer Area 3',
         'id'     => 'footer3'
      ));

      register_sidebar( array(
         'name'   => 'Footer Area 4',
         'id'     => 'footer4'
      ));
   }

   add_action('widgets_init', 'ourWidgetInit');
?>
