<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <div class="post-nav post-prev">
            <?php echo get_previous_posts_link('Prev page'); ?>
        </div>
        <div class="post-nav post-next">
            <?php echo get_next_posts_link('Next page'); ?>
        </div>

        <div class="highlight-container sans">
            <div class="footer-container sans">
                <p class="pull-left pull-reset-mobile margin-reset">
                    <?php echo $wp_query->found_posts; ?> results for "<?php echo get_search_query(); ?>"
                </p>

                <?php if ($wp_query->max_num_pages > 1) : ?>

                    <p class="pull-right pull-reset-mobile margin-reset">
                        <?php echo get_previous_posts_link('&laquo; prev') . ' page ' . $paged . ' of ' . $wp_query->max_num_pages . ' ' . get_next_posts_link('next &raquo;'); ?>
                    </p>

                <?php endif ?>

                <div class="clearfix"></div>
            </div>
        </div>

        <ul class="panel-container reflex-container reflex-wrap reflex-justify-center">

        <?php while (have_posts()) : the_post(); ?>

            <li class="reflex-col-md-3 reflex-col-sm-4 reflex-col-xs-6">
                <a class="panel reflex-item reflex-item-margin-lg" href="<?php the_permalink() ?>">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    <h2><?php echo get_the_title(); ?></h2>
                </a>
            </li>

        <?php endwhile;/* end the main loop */ ?>

        </ul>

        <?php if ($wp_query->max_num_pages > 1) : ?>

            <p class="sans">
                <?php echo get_previous_posts_link('&laquo; prev') . ' page ' . $paged . ' of ' . $wp_query->max_num_pages . ' ' . get_next_posts_link('next &raquo;'); ?>
            </p>

        <?php endif ?>

        <div class="post-container">
            <?php get_search_form(); ?>
        </div>

    <?php else : /* no posts found */ ?>

        <div class="footer-container">
            <p>Sorry but "<?php echo get_search_query() ?>" returned no results.</p>
        </div>

        <div class="post-container">
            <?php get_search_form(); ?>
        </div>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
