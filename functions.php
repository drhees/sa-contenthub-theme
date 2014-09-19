<?php
if ( !defined('ABSPATH')) exit;

// Remove Wordpress Version 
remove_action('wp_head', 'wp_generator');

// Add Menu Suport To Back End
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' ),
      'side-menu' => __( 'Side Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}
if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'medium-thumb', 200, 500 ); //300 pixels wide (and unlimited height)
		add_image_size( 'large-thumb', 400, 400, true ); //(cropped)
}

// Here are the sidebars
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' =>'Home Page Widgets',
		'description' => "Home Page Widgets - On The Side",
		'before_widget' => '<div id="%1$s" class="widget %2$s">', 
		'after_widget' => '</div>', 
		'before_title' => '<h3 class="widgettitle">', 
		'after_title' => '</h3>', 
));


if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Home Page Content',
	'description' => "Home Page Content",
	'before_widget' => '<div id="%1$s" class="widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle SectionTitle">', 
	'after_title' => '</h3>', 
	));
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Home Page Pools',
	'description' => "This is a alternate incase the default one will not do",
	'before_widget' => '<div id="%1$s" class="widget %2$s">', 
	'after_widget' => '</div>', 
	'before_title' => '<h3 class="widgettitle">', 
	'after_title' => '</h3>', 
	));
 
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'name' =>'Jobs-Description Sidebar',
    'description' => "This is for post only.",
    'before_widget' => '<div id="%1$s" class="widget %2$s">', 
    'after_widget' => '</div>', 
    'before_title' => '<h3 class="widgettitle">', 
    'after_title' => '</h3>', 
    ));
	
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'name' =>'Other Page Sidebar',
    'description' => "This is for post only.",
    'before_widget' => '<div id="%1$s" class="widget %2$s">', 
    'after_widget' => '</div>', 
    'before_title' => '<h3 class="widgettitle">', 
    'after_title' => '</h3>', 
    ));


add_filter( 'login_headerurl', 'namespace_login_headerurl' );
/**
 * Replaces the login header logo URL
 *
 * @param $url
 */
function namespace_login_headerurl( $url ) {
    $url = home_url( '/' );
    return $url;
}

add_filter( 'login_headertitle', 'namespace_login_headertitle' );
/**
 * Replaces the login header logo title
 *
 * @param $title
 */
function namespace_login_headertitle( $title ) {
    $title = get_bloginfo( 'name' );
    return $title;
}

add_action( 'login_head', 'namespace_login_style' );
/**
 * Replaces the login header logo
 */
function namespace_login_style() {
    echo '<style>.login h1 a { background-image: url( ' . get_template_directory_uri() . '/images/logo.png ) !important; }</style>';
}

/****** Add Thumbnails in Manage Posts/Pages List ******/
if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {

    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );

    function AddThumbColumn($cols) {

        $cols['thumbnail'] = __('Thumbnail');

        return $cols;
    }

    function AddThumbValue($column_name, $post_id) {

            $width = (int) 35;
            $height = (int) 35;

            if ( 'thumbnail' == $column_name ) {
                // thumbnail of WP 2.9
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // image from gallery
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }

    // for posts
    add_filter( 'manage_posts_columns', 'AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );

    // for pages
    add_filter( 'manage_pages_columns', 'AddThumbColumn' );
    add_action( 'manage_pages_custom_column', 'AddThumbValue', 10, 2 );
}

// make TinyMCE allow iframes
add_filter('tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );


add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}


// Add excerpts to pages 
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
 
}

// What Jquery to use 
add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . 
    ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . 
    "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
}


// ?? ? ? ? ? I think add html to widget
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"&lt;"."?php")!==false){
          ob_start();
          eval("?"."&gt;".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

// Stop wordpress from wanting link images when making a post
update_option('image_default_link_type' , '');

///// Add read more link to end of excrpt -

function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('[read more]', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



///// Add post count to post 
//// http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
//// Dont forget to add the count code to the post YO 
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);



