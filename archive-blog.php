<?php
/*
Template Name: Blog
*/
?>

<?php get_header() ?>
<main class="blog">
    <div class="container-main">
        <?php custom_breadcrumbs(); ?>
        <h1 class="blog__title"><?php the_title() ?></h1>
        <div class="blog__subtitle"><?php the_content() ?></div>
        <?php

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $time_order = isset($_GET['time_order']) ? $_GET['time_order'] : 'newest';

        if (empty($time_order)) {
            $time_order = 'newest';
        }


        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'category_name' => $category,
            'orderby' => ($time_order == 'newest') ? 'date' : 'date',
            'order' => ($time_order == 'newest') ? 'DESC' : 'ASC',
        );

        $query = new WP_Query($args);
        ?>

        <div id="post-filters" class="blog__filter">
            <div class="blog__filter-cat">
                <a href="<?php echo esc_url(add_query_arg(array('category' => '', 'time_order' => $time_order), get_permalink())); ?>" <?php echo empty($category) ? 'class="active"' : ''; ?>>Show
                    All</a>

                <?php
                $categories = get_categories();
                foreach ($categories as $cat) {
                    $selected = ($cat->slug == $category) ? ' class="active"' : '';
                    echo '<a href="' . esc_url(add_query_arg(array('category' => $cat->slug, 'time_order' => $time_order), get_permalink())) . '"' . $selected . '>' . $cat->name . '</a>';
                }
                ?>
            </div>

            <div class="blog__filter-time">
                <label for="selectedOption">Sort By:</label>
                <div id="selectedOption"
                     class="blog__filter-time_method"><?php echo ($time_order == 'newest') ? 'Most recent posts first' : 'Oldest posts first'; ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/svg/black-arrow.svg'; ?>" alt=""></div>
                <ul>
                    <li>
                        <a href="<?php echo esc_url(add_query_arg(array('time_order' => 'newest', 'category' => $category), get_permalink())); ?>" <?php echo ($time_order == 'newest') ? 'disabled' : ''; ?> <?php echo ($time_order == 'newest') ? 'class="active"' : ''; ?>>Most
                            recent posts first</a></li>
                    <li>
                        <a href="<?php echo esc_url(add_query_arg(array('time_order' => 'oldest', 'category' => $category), get_permalink())); ?>" <?php echo ($time_order == 'oldest') ? 'disabled' : ''; ?> <?php echo ($time_order == 'oldest') ? 'class="active"' : ''; ?>>Oldest
                            posts first</a></li>
                </ul>
            </div>
        </div>

        <div class="blog__posts">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>
                    <a data-wow-duration="0.5s" href="<?php echo get_permalink() ?>"
                       class="blog__item wow animate__zoomIn">
                        <div class="blog__item-main-img"><?php the_post_thumbnail() ?></div>
                        <div class="blog__item-body">
                            <div class="blog__item-body-category animated-link">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $category = $categories[0];
                                    echo esc_html($category->name);
                                }
                                ?>
                            </div>
                            <h1 class="blog__item-body-title"><?php the_title(); ?></h1>
                            <div class="blog__item-body_info">
                                <div class="blog__item-body_info-date">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/svg/CalendarBlank.svg'; ?>"
                                         alt="">
                                    <?php echo get_the_date('d.m.Y'); ?>
                                </div>
                                <div class="blog__item-body_info-date">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/svg/Clock.svg'; ?>"
                                         alt="">
                                    <span><?php echo reading_time(); ?> min to read</span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                endwhile;
            else :
                echo 'No posts found';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer() ?>
