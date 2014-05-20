<?php get_header(); ?>


    <?php /* begin the loop */ if (have_posts()) : ?>

    <?php if (!is_single() && !is_page()) : ?>

        <div class="panel-container">
            <div class="tags-container">
                <?php
                    $tags = get_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a class="tag ' . $tag->name . (is_tag($tag->name) ? ' active' : null) . '" href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "View all posts tagged with %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> ';
                        }
                    }
                ?>
            </div>

    <? endif ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if (is_page()) : /* show page contents */ ?>

            <div class="post-container">
                <h1><?php the_title(); ?></h1>
                <div class="post-content">
                    <?php the_content('Read more &gt;'); ?>
                </div>
                <p><?php wp_link_pages('next_or_number=number&pagelink=page %'); ?></p>
                <p><?php edit_post_link('Edit', '[ ', ' ]'); ?></p>
            </div>

        <?php elseif (is_single()) : /* show post contents */ ?>

            <div class="post-nav prev-post">
                <?php previous_post_link('%link', '<span>&lt;</span><span class="sr-only">Previous post</span>') ?>
            </div>
            <div class="post-nav next-post">
                <?php next_post_link('%link', '<span class="sr-only">Next post</span><span>&gt;</span>') ?>
            </div>
            <div class="post-container">
                <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                <div class="post-content">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content('Read more &gt;'); ?>
                </div>
                <div class="postmeta">
                    <p>
                    <?php the_tags('Tags: ', ', ', ' | '); ?> <?php the_category(', ') ?> | <a href="<?php the_permalink() ?>">Permalink</a> |  <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?> | <?php edit_post_link('Edit', ' ', ' | '); ?> Posted <?php the_date() ?> by  <?php the_author_link(); ?> </p>
                </div>
                <?php comments_template(); ?>
            </div>

        <?php else : /* show excerpts */ ?>

            <div class="panel">
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
