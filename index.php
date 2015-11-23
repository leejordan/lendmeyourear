<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <?php if (is_archive() || is_home()) : ?>

            <nav class="post-nav post-prev">
                <?php echo get_previous_posts_link('Newer posts'); ?>
            </nav>
            <nav class="post-nav post-next">
                <?php echo get_next_posts_link('Older posts'); ?>
            </nav>

        <?php endif ?>

        <main class="container-lg">

        <?php if (is_archive()) : ?>

            <section role="status">
                <h1 class="theme-intro">
                    Showing posts tagged as <strong>"<?php single_cat_title('', true ); ?>"</strong>
                </h1>
            </section>

        <?php endif; ?>

            <div class="grid grid--align-start">

                <?php if (is_home()) : ?>

                    <nav role="navigation" class="grid__col-xs-12 grid__col-sm-3 grid__col-md-2 grid--align-center grid__col--bleed">
                        <ul class="grid nav-pills">

                            <?php
                                $tags = get_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<li class="grid__col-12"><a data-filter="' . $tag->name . '" class="grid__cell' . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li>';
                                    }
                                }
                            ?>

                        </ul>
                    </nav>

                <? endif; ?>

                <?php if (is_archive() || is_home()) : ?>

                    <?php if (is_archive()) : ?>

                        <section class="grid__col-xs-12 grid__col--bleed">

                    <?php else : ?>

                        <section class="grid__col-xs-12 grid__col-sm-9 grid__col-md-10 grid__col--bleed">

                    <?php endif; ?>

                            <ul class="grid grid--justify-center">

                                <?php while (have_posts()) : the_post(); ?>

                                    <li class="grid__col-xs-6 grid__col-md-4 grid__col-lg-3">
                                        <a class="grid__cell panel" href="<?php the_permalink() ?>">

                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail('small'); ?>
                                            <?php endif ?>

                                            <div class="panel-text">
                                                <h2><?php echo get_the_title(); ?></h2>
                                            </div>
                                        </a>
                                    </li>

                                <?php endwhile;/* end the main loop */ ?>

                                <?php if ($wp_query->max_num_pages > 1) : ?>

                                    <p class="grid__col-12 grid--direction-row grid--justify-center">
                                        <?php echo get_previous_posts_link('&laquo; prev') . '<span class="buffer-hz">page ' . $paged . ' of ' . $wp_query->max_num_pages . '</span>' . get_next_posts_link('next &raquo;'); ?>
                                    </p>

                                <?php endif ?>

                            </ul>
                        </section>

                <?php endif ?>

            </div>
        </main>

    <?php else : /* no posts found */ ?>

        <?php include '404.php' ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
