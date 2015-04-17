<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <div class="highlight-container">
            <div class="post-container">
                <p class="sans head margin-reset">Search results for "<?php echo get_search_query(); ?>"</p>
            </div>
        </div>

        <ul class="panel-container reflex-container reflex-wrap reflex-justify-center">

        <?php while (have_posts()) : the_post(); ?>

            <li class="reflex-col-md-3 reflex-col-sm-4 reflex-col-xs-6">
                <a class="panel reflex-item reflex-item-margin-lg reflex-item-content-margin-lg" href="<?php the_permalink() ?>">
                    <h2><?php the_title(); ?></h2>
                    <div class="reflex-item-footer">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    </div>
                </a>
            </li>

        <?php endwhile;/* end the main loop */ ?>

        </ul>

        <div class="post-container">
            <?php get_search_form(); ?>
        </div>

    <?php else : /* no posts found */ ?>

        <?php include '404.php' ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
