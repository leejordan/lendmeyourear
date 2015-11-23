<?php get_header(); ?>

    <div class="highlight-container">
        <div class="container-sm">
    		<h2 class="theme-intro">
                Sorry, the page you are looking for is not available. Maybe it moved. Maybe it was never here in the first place. Maybe you imagined the whole thing. You can try a search:</p>
            </h2>

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
                            <?php the_post_thumbnail('smal'); ?>
                        <?php endif ?>

                        <div class="panel-text">
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
                    </a>
                </li>

            <?php endforeach; ?>

        </ul>
    </div>

<?php get_footer(); ?>
