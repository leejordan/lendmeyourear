<?php get_header(); ?>


    <?php /* begin the loop */ if (have_posts()) : ?>

    <?php if (!is_single() && !is_page()) : ?>

        <div class="panel-container">
            <div class="tags-container">
                <?php
                    $tags = get_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a class="tag-pill ' . $tag->name . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> ';
                        }
                    }
                ?>
            </div>

    <? endif ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if (is_page()) : /* show page contents */ ?>

            <div class="post-container">
                <h1><?php the_title(); ?></h1>
                <?php the_content('Read more &gt;'); ?>
            </div>

        <?php elseif (is_single()) : /* show post contents */ ?>

            <div class="post-container">
                <div class="post-header">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    <div class="post-header-text">
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <p class="post-tags"><?php echo get_the_tag_list( null, ' / ', null ); ?></p>
                    </div>
                </div>
                <div class="post-content">
                    <?php the_content('Read more &gt;'); ?>
                    <p>by <?php the_author_posts_link(); ?> on <?php the_date(); ?></p>
                </div>
                <hr>
                <?php comments_template(); ?>
            </div>

        <?php else : /* show excerpts */ ?>

            <div class="panel <?php foreach (get_the_tags() as $tag) { echo $tag->name . " "; } ?>">
                <a href="<?php the_permalink() ?>">
                    <div class="panel-intro-wrap">
                        <div class="panel-intro">
                            <h2><?php the_title(); ?></h2>
                            <div>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-feature-image">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    </div>
                </a>
            </div>

        <?php endif; /* end if page or post */ ?>

    <?php endwhile;/* end the main loop */ ?>

    <?php if (!is_single() && !is_page()) : ?>

        </div>

    <? endif ?>

    <?php else : /* show page not found message */ ?>

    <div class="pagecontent pagenotfound">

        <h1>Page not found</h1>

        <p>Sorry, the page you are looking for is not available. It may have moved, or you may have followed a bad link. Please 
        <a href="<?php bloginfo('url') ?>">visit our homepage</a> to find what you're looking for.</p>

    </div>

    <?php endif; /* end if have_posts */ ?>


<?php /* footer */ get_footer(); ?>
