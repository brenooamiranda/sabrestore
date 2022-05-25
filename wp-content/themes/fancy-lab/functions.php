<?php

/**
 * Fancy Lab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fancy Lab
 */

require_once get_template_directory() . '/inc/customizer.php';

/**
 * Enqueue scripts and styles.
 */
function fancy_lab_scripts(){
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.4.1', true );
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.4.1', 'all' );
    // Theme's main stylesheet
    wp_enqueue_style( 'fancy-lab-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ), 'all' );

    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|Seaweed+Script' );

    // Flexslider
    wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '2.7.2', 'all' );
    wp_enqueue_script( 'flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '2.7.2', true );
    wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '2.7.2', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'fancy_lab_scripts' );

function fancy_lab_config(){

    // Bootstrap Menu
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

    register_nav_menus(
        array(
            'fancy_lab_main_menu'	=> esc_html__( 'Fancy Lab Main Menu', 'fancy-lab' ),
            'fancy_lab_footer_menu'	=> esc_html__( 'Fancy Lab Footer Menu', 'fancy-lab' )
        )
    );

    $textdomain = 'fancy-lab';
    load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width'		=> 255,
        'single_image_width'		=> 255,
        'product_grid'				=> array(
            'default_rows'    => 10,
            'min_rows'        => 5,
            'max_rows'        => 10,
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,
        )
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'custom-logo' , array(
        'height'		=> 85,
        'width'			=> 160,
        'flex_height'	=> true,
        'flex_width'	=> true
    ) );

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'fancy-lab-slider', 1920, 800, array( 'center', 'center' ) );
    add_image_size( 'fancy-lab-blog', 960, 640, array( 'center', 'center' ) );

    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }

    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'fancy_lab_config', 0 );

if( class_exists( 'WooCommerce' )){
    require get_template_directory() . '/inc/wp-modifications.php';
}


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'fancy_lab_woocommerce_header_add_to_cart_fragment' );

function fancy_lab_woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <span class="items"><?php echo esc_html( WP()->cart->get_cart_contents_count() ); ?></span>
    <?php
    $fragments['span.items'] = ob_get_clean();
    return $fragments;
}

add_action( 'widgets_init', 'fancy_lab_sidebars' );
function fancy_lab_sidebars(){
    register_sidebar(
        array(
            'name'			=> esc_html__( 'Fancy Lab Main Sidebar', 'fancy-lab' ),
            'id'			=> 'fancy-lab-sidebar-1',
            'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="widget-title">',
            'after_title'	=> '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'			=> esc_html__( 'Sidebar Shop', 'fancy-lab' ),
            'id'			=> 'fancy-lab-sidebar-shop',
            'description'	=> esc_html__( 'Drag and drop your WooCommerce widgets here', 'fancy-lab' ),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="widget-title">',
            'after_title'	=> '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'			=> esc_html__( 'Footer Sidebar 1', 'fancy-lab' ),
            'id'			=> 'fancy-lab-sidebar-footer-1',
            'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="widget-title">',
            'after_title'	=> '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'			=> esc_html__( 'Footer Sidebar 2', 'fancy-lab' ),
            'id'			=> 'fancy-lab-sidebar-footer-2',
            'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="widget-title">',
            'after_title'	=> '</h4>',
        )
    );

    register_sidebar(
        array(
            'name'			=> esc_html__( 'Footer Sidebar 3', 'fancy-lab' ),
            'id'			=> 'fancy-lab-sidebar-footer-3',
            'description'	=> esc_html__( 'Drag and drop your widgets here', 'fancy-lab' ),
            'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">',
            'after_widget'	=> '</div>',
            'before_title'	=> '<h4 class="widget-title">',
            'after_title'	=> '</h4>',
        )
    );
}