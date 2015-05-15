<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <?php if (is_archive() || is_home()) : ?>

            <div class="post-nav post-prev">
                <?php echo get_previous_posts_link('Newer posts'); ?>
            </div>
            <div class="post-nav post-next">
                <?php echo get_next_posts_link('Older posts'); ?>
            </div>

            <div class="highlight-container">
                <ul class="nav-container">
                    <?php
                        $tags = get_tags();
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<li class="nav-item"><a data-filter="' . $tag->name . '" class="pill' . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
                            }
                        }
                    ?>

                </ul>
            </div>

        <?php endif ?>

        <ul class="reflex-container panel-container">

    	<?php while (have_posts()) : the_post(); ?>

            <li class="reflex-col-md-3 reflex-col-sm-4 reflex-col-xs-6">
                <a class="panel reflex-item reflex-item-margin-lg" href="<?php the_permalink() ?>">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    <h2><?php echo get_the_title(); ?></h2>
                </a>
            </li>

        <?php endwhile;/* end the main loop */ ?>

        </ul>

        <?php if (is_archive() || is_home()) : ?>

            <?php if ($wp_query->max_num_pages > 1) : ?>

                <p class="sans">
                    <?php echo get_previous_posts_link('&laquo; prev') . ' page ' . $paged . ' of ' . $wp_query->max_num_pages . ' ' . get_next_posts_link('next &raquo;'); ?>
                </p>

            <?php endif ?>

        <?php endif ?>

    <?php else : /* no posts found */ ?>

        <?php include '404.php' ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
