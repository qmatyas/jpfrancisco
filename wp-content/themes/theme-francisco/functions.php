<?php 
show_admin_bar(false);

add_theme_support( 'post-thumbnails' );

include 'include/jp_metaboxes.php';
include 'include/jp_projets.php';

function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );  
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  // add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );

function ayAdminScripts() {
  wp_enqueue_media();
  wp_enqueue_script( 'ayadminjs', get_bloginfo('template_url').'/assets/js/admin.js', array( 'jquery', 'jquery-ui-datepicker', 'media-upload', 'thickbox' ) );
}
add_action('admin_enqueue_scripts', 'ayAdminScripts');

function ayAdminStyles() {
  wp_enqueue_style('ayadmincss', get_bloginfo('template_url').'/admin.min.css');
  wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
}
add_action('admin_print_styles', 'ayAdminStyles', 11 );

function ay_admin_footer () {
  echo 'Merci d\'avoir fait appel à Quentin MATYAS pour votre site';
}
add_filter('admin_footer_text', 'ay_admin_footer');