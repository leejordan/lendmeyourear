<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <div class="post-nav post-prev">
            <?php echo get_previous_posts_link('Prev page'); ?>
        </div>
        <div class="post-nav post-next">
            <?php echo get_next_posts_link('Next page'); ?>
        </div>

        <main class="container-lg">

            <section role="status">
                <h1 class="theme-intro">
                    Showing results for <strong>"<?php echo get_search_query(); ?>"</strong>
                </h1>
            </section>

            <div class="grid grid--align-start">
                <section class="grid__col-xs-12 grid__col--bleed">
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
            </div>

            <div class="container-sm">
                <?php get_search_form(); ?>
            </div>
        </main>

    <?php else : /* no posts found */ ?>

        <div class="highlight-container">
            <div class="container-sm">

                <h1 class="theme-intro" role="status">
                    Sorry but <strong>"<?php echo get_search_query(); ?>"</strong> returned no results. You can try searching again:
                </h1>

                <?php get_search_form(); ?>

            </div>
        </div>

        <div class="container-lg">
            <h2 class="theme-intro">Or take a chance on these random posts:</h2>

            <ul class="grid grid--justify-center">

                <?php
                $args = array( 'numberposts' => 4, 'orderby' => 'rand' );
                $rand_posts = get_posts( $args );
                foreach( $rand_posts as $post ) : ?>

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

                <?php endforeach; ?>

            </ul>
        </div>

    <?php endif; /* end if haveposts */ ?>

<?php /* footer */ get_footer(); ?>
