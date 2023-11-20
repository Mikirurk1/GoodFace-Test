<?php

add_action( 'wp_enqueue_scripts', function () {

    wp_enqueue_style( 'style-bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap.min.css');
    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/libs/animate.min.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.css');
    wp_enqueue_style( 'style-main', get_template_directory_uri() . '/assets/css/style.css');

    wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.7.0.min.js');
    wp_register_script('jquery-ui', 'https://code.jquery.com/ui/1.13.1/jquery-ui.min.js', array('jquery'), null, false);
    wp_register_style('jquery-ui-style', 'https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css', array(), null, false);
    wp_enqueue_script('jquery-ui');
    wp_enqueue_style('jquery-ui-style');

    wp_enqueue_script('masked-input', get_template_directory_uri() . '/assets/libs/jquery.maskedinput.min.js', array('jquery'));
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/assets/libs/wow.min.js');
    wp_enqueue_script('vivus-js', get_template_directory_uri() . '/assets/libs/vivus.min.js');
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/libs/swiper-bundle.min.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/app.js', array('jquery') );

    wp_enqueue_script('ajax_js', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'));
    wp_localize_script('ajax_js', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));

});



add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support( 'menus' );


function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
        )
    );
}

add_action( 'init', 'register_my_menus' );




class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $output .= '<li class="menu-item menu-item-' . $data_object->ID . '">';
        if ( ! $data_object->url ) {
            $output .= '<span class="soon">' . esc_html( $data_object->title ) . '</span>';
        } else {
            $output .= '<a  href="' . esc_url( $data_object->url ) . '"><span class="animated-link">' . esc_html( $data_object->title ) . '</span><img src="' . get_template_directory_uri() . '/assets/svg/purp-arrow.svg" alt=""></a>';
        }
    }
}


function reading_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 100);

    if ($readingtime == 1) {
        $timer = " minute";
    } else {
        $timer = " minutes";
    }
    $totalreadingtime = $readingtime . $timer;

    return $totalreadingtime;
}




require get_template_directory() . '/assets/php/email-subscriber.php';
require get_template_directory() . '/assets/php/breadcrumbs.php';



