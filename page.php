<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <div class="post-container">
                <h2><?php the_title(); ?></h2>
                <?php the_content('Read more &gt;'); ?>
            </div>

        <?php endwhile;/* end the main loop */ ?>

    <?php else : /* no posts found */ ?>

        <?php include '404.php' ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
