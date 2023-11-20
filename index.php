<?php get_header() ?>
    <main class="post">
        <div class="container-main">
            <?php custom_breadcrumbs(); ?>
            <div class="post__category animated-link">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    $category = $categories[0];
                    echo esc_html($category->name);
                }
                ?>
            </div>
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post__info">
                <div class="post__info-date">
                    <img src="<?php echo get_template_directory_uri() . '/assets/svg/CalendarBlank.svg'; ?>" alt="">
                    <?php echo get_the_date('d.m.Y'); ?>
                </div>
                <div class="post__info-date">
                    <img src="<?php echo get_template_directory_uri() . '/assets/svg/Clock.svg'; ?>" alt="">
                    <span><?php echo reading_time(); ?> min to read</span>
                </div>
            </div>
            <div class="post__main-img"><?php the_post_thumbnail() ?></div>
            <div class="container-short">
                <article class="post__body"><?php the_content(); ?></article>
            </div>


            <div class="post__similar">
                <div class="d-flex align-items-center justify-content-between ">
                    <h2 class="post__similar-title">You may be interested</h2>
                    <div class="swiper-btn-container">
                        <div class="swiper-button-prev"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/svg/black-arrow.svg'; ?>"
                                    alt="prev"></div>
                        <div class="swiper-button-next"><img
                                    src="<?php echo get_template_directory_uri() . '/assets/svg/black-arrow.svg'; ?>"
                                    alt="next"></div>
                    </div>

                </div>


                <div class="swiper similarPosts">

                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'post__not_in' => array(get_the_ID()),
                            'post_status' => 'publish',
                        );

                        $query = new WP_Query($args);

                        while ($query->have_posts()) {
                            $query->the_post();

                            ?>
                            <div class="swiper-slide">
                                <a data-wow-duration="0.5s" href="<?php echo get_permalink() ?>"
                                   class=" post__similar-item  wow animate__zoomIn">
                                    <div class="post__similar-item-main-img"><?php the_post_thumbnail() ?></div>
                                    <div class="post__similar-item-body">
                                        <div class="post__similar-item-body-category animated-link">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                $category = $categories[0];
                                                echo esc_html($category->name);
                                            }
                                            ?>
                                        </div>
                                        <h1 class="post__similar-item-body-title"><?php the_title(); ?></h1>
                                        <div class="post__similar-item-body_info">
                                            <div class="post__similar-item-body_info-date">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/svg/CalendarBlank.svg'; ?>"
                                                     alt="">
                                                <?php echo get_the_date('d.m.Y'); ?>
                                            </div>
                                            <div class="post__similar-item-body_info-date">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/svg/Clock.svg'; ?>"
                                                     alt="">
                                                <span><?php echo reading_time(); ?> min to read</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }

                        wp_reset_postdata();
                        ?>
                    </div>
                    

                </div>
                <div class="swiper-pagination"></div>



            </div>
        </div>
    </main>


<?php get_footer() ?>