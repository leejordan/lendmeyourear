<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <div class="post-nav post-prev">
                <?php previous_post_link('%link', 'Older post'); ?>
            </div>
            <div class="post-nav post-next">
                <?php next_post_link('%link', 'Newer post'); ?>
            </div>

            <?php if ( has_post_thumbnail() && ! get_post_meta($post->ID, 'custom-header', true) ) : ?>
                <div class="post-header-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>

            <?php elseif ( get_post_meta($post->ID, 'custom-header', true) ) : ?>
                <div class="post-container">
                    <?php echo get_post_meta($post->ID, 'custom-header', true) ?>
                </div>
            <?php endif ?>

            <?php echo get_post_meta($post->ID, 'custom-markup', true) ?>

            <div class="post-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content('Read more &gt;'); ?>
                <div class="post-meta">
                    <p>
                        Posted on: <?php the_date(); ?>
                        <br>Tagged: <?php echo get_the_tag_list( null, ', ', null ); ?>
                    </p>
                </div>
            </div>
            <div class="highlight-container">
                <div class="footer-container">
                    <div class="clearfix"></div>
                    <?php comments_template(null, true); ?>
                </div>
            </div>

        <?php endwhile;/* end the main loop */ ?>

    <?php else : /* no posts found */ ?>

        <?php include '404.php' ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
