<?php

function custom_breadcrumbs()
{
    if (!is_front_page()) {
        echo '<div class="breadcrumbs">';

        echo '<a class="animated-link" href="' . home_url('/') . '">Home</a>';

        if (is_category() || is_single()) {
            echo '<span class="breadcrumbs__sep"> <img src="' . get_template_directory_uri() . '/assets/svg/black-arrow.svg" alt="separator"> </span>';
            if ( get_option( 'page_for_posts' ) ) {
                echo '<a class="animated-link" href="'.esc_url(get_permalink( get_option( 'page_for_posts' ) )).'">'.esc_html__( 'Blog', 'textdomain' ).'</a>';
            } else {
                echo '<a class="animated-link" href="'.esc_url( home_url( '/blog' ) ).'">'.esc_html__( 'Blog', 'textdomain' ).'</a>';
            }
            echo '<span class="breadcrumbs__sep"> <img src="' . get_template_directory_uri() . '/assets/svg/black-arrow.svg" alt="separator"> </span>';
            echo '<span>';
            the_title() ;
            echo'</span>';

        } elseif (is_page()) {
            echo '<span class="breadcrumbs__sep"> <img src="' . get_template_directory_uri() . '/assets/svg/black-arrow.svg" alt="separator"> </span>';
            echo '<span>';
            the_title() ;
            echo'</span>';
        }

        echo '</div>';
    }
}
