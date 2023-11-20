<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>

    <title><?php wp_title() ?></title>
</head>
<body>


<header class="header">
    <div class="container-main">
        <div class="position-relative d-flex justify-content-center">
            <div class="header__company"> <span class="animated-link"><?php echo get_bloginfo('name'); ?> </span><img
                        src="<?php echo get_template_directory_uri() . '/assets/svg/purp-arrow.svg'; ?>" alt="arrow">
            </div>
            <?php
            wp_nav_menu(array(
                'container' => 'nav',
                'container_id' => 'header-menu-container',
                'container_class' => 'main-nav',
                'walker' => new Custom_Walker_Nav_Menu(),
            ));
            ?>
        </div>
        <button class="white-btn soon">Log in</button>
    </div>
</header>