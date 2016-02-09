<?php

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}

add_action('init', 'register_my_menu');

wp_deregister_script('jquery');
wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), false, '1.3.2');
wp_enqueue_script('jquery');


function mnemonic250_scripts()
{
    // Add custom fonts, used in the main stylesheet.
    //wp_enqueue_style( 'mnemonic250-fonts', mnemonic250_fonts_url(), array(), null );

    // Add Genericons, used in the main stylesheet.
    //wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

    // Theme stylesheet.
    wp_enqueue_style('mnemonic250-style1', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('mnemonic250-style2', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('mnemonic250-style', get_stylesheet_uri());


    // Load the Internet Explorer specific stylesheet.
    //wp_enqueue_style( 'mnemonic250-ie', get_template_directory_uri() . '/css/ie.css', array( 'mnemonic250-style' ), '20150930' );
    //wp_style_add_data( 'mnemonic250-ie', 'conditional', 'lt IE 10' );

    // Load the Internet Explorer 8 specific stylesheet.
    //wp_enqueue_style( 'mnemonic250-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'mnemonic250-style' ), '20151230' );
    //wp_style_add_data( 'mnemonic250-ie8', 'conditional', 'lt IE 9' );

    // Load the Internet Explorer 7 specific stylesheet.
    //wp_enqueue_style( 'mnemonic250-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'mnemonic250-style' ), '20150930' );
    //wp_style_add_data( 'mnemonic250-ie7', 'conditional', 'lt IE 8' );

    // Load the html5 shiv.
    //wp_enqueue_script( 'mnemonic250-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
    //wp_script_add_data( 'mnemonic250-html5', 'conditional', 'lt IE 9' );

    //wp_enqueue_script( 'mnemonic250-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}

//	if ( is_singular() && wp_attachment_is_image() ) {
//		wp_enqueue_script( 'mnemonic250-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
//	}

//	wp_enqueue_script( 'mnemonic250-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

//	wp_localize_script( 'mnemonic250-script', 'screenReaderText', array(
//		'expand'   => __( 'expand child menu', 'mnemonic250' ),
//		'collapse' => __( 'collapse child menu', 'mnemonic250' ),
//	) );
}

add_action('wp_enqueue_scripts', 'mnemonic250_scripts');

function mnemonic250_wp_nav()
{
    return $mnemonic250_wp_nav = array(
        'theme_location' => '',
        'menu' => '',
        'container' => 'nav',
        'container_class' => '',
        'container_id' => '',
        'menu_class' => '',
        'menu_id' => '',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="js-navigation-menu" class="navigation-menu show %2$s">%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    );
}

//wp_nav_menu( array('theme_location'=>'primary','walker' => new SH_Child_Only_Walker(),'depth' => 0) );

add_filter('wp_nav_menu_args', 'mnemonic250_wp_nav');

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    //    if(is_single() && $item->title == "Blog"){ //Notice you can change the conditional from is_single() and $item->title
    $classes[] = "nav-link";
    //  }
    return $classes;
}

class Walker_Simple_Example extends Walker_Category
{


    function start_el(&$output, $item, $depth = 0, $args = array())
    {
        if ($_GET['in_categories']) {
            if (in_array($item->term_id, $_GET['in_categories'])) {
                $output .= "<li><input id='$item->slug' type='checkbox' value='$item->term_id' name='in_categories[]' checked  ><label for='$item->slug'>" . esc_attr($item->name) . "</label>";
            } else {
                $output .= "<li><input id='$item->slug' type='checkbox' value='$item->term_id' name='in_categories[]'  ><label for='$item->slug'>" . esc_attr($item->name) . "</label>";
            }
        } else {
            $output .= "<li><input id='$item->slug' type='checkbox' value='$item->term_id' name='in_categories[]'><label for='$item->slug'>" . esc_attr($item->name) . "</label>";
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more)
{
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> leer más...</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function theme_settings_page()
{ ?>
    <div class="wrap">
        <h1>Theme Panel</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function display_instagram_element()
{
    ?>
    <input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>"/>
    <?php
}

function display_facebook_element()
{
    ?>
    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>"/>
    <?php
}

function display_twitter_element()
{
    ?>
    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>"/>
    <?php
}

function logo_display()
{
    ?>
    <input type="file" name="logo"/>
    <?php echo get_option('logo'); ?>
    <?php
}

function handle_logo_upload()
{
    if (!empty($_FILES["demo-file"]["tmp_name"])) {
        $urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
    }

    return $option;
}

function background_home_display()
{
    ?>
    <input type="file" name="background_home"/>
    <?php echo get_option('background_home'); ?>
    <?php
}

function handle_background_home_upload()
{
    if (!empty($_FILES["demo-file"]["tmp_name"])) {
        $urls = wp_handle_upload($_FILES["background_home"], array('test_form' => FALSE));
        $temp = $urls["url"];
        return $temp;
    }

    return $option;
}

function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("instagram_url", "Instagram Profile Url", "display_instagram_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
//    add_settings_field("logo", "Logo", "logo_display", "theme-options", "section");
//    add_settings_field("background_home", "Imagen de fondo", "background_home_display", "theme-options", "section");

//    register_setting("section", "logo", "handle_logo_upload");
//    register_setting("section", "background_home", "handle_background_home_upload");
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "instagram_url");
}

add_action("admin_init", "display_theme_panel_fields");

function add_theme_menu_item()
{
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

?>