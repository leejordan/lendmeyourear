<?php get_header(); ?>

    <?php /* if have posts */ if (have_posts()) : ?>

        <?php if (!is_singular()) : ?>

            <div class="panel-container">

            <?php if (is_search()) : ?>

                <h2>Search results for "<?php echo get_search_query(); ?>"</h2>

            <?php endif ?>

        <? endif ?>

    	<?php while (have_posts()) : the_post(); ?>

    		<?php if (is_page()) : /* show page contents */ ?>

                <div class="post-container">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content('Read more &gt;'); ?>
                </div>

            <?php elseif (is_single()) : /* show post contents */ ?>

                <div class="post-nav post-prev">
                    <?php previous_post_link('%link', 'Older post'); ?>
                </div>
                <div class="post-nav post-next">
                    <?php next_post_link('%link', 'Newer post'); ?>
                </div>

                <div class="highlight-container">
                    <div class="post-container post-header">
                        <h1><?php the_title(); ?></h1>
                        <?php if ( has_post_thumbnail() && !get_post_meta($post->ID, 'custom-header', true) ) the_post_thumbnail('large'); ?>
                        <?php echo get_post_meta($post->ID, 'custom-header', true) ?>
                        <?php echo get_post_meta($post->ID, 'custom-markup', true) ?>
                    </div>
                </div>
                <div class="post-container">
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

            <?php else : /* show post panels */ ?>

                <a class="panel" href="<?php the_permalink() ?>" data-tags="<?php foreach (get_the_tags() as $tag) { echo $tag->name . " "; } ?>">
                    <div class="panel-intro-wrap">
                        <div class="panel-intro">
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="panel-feature-image">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail('large'); ?>
                    </div>
                </a>

            <?php endif; /* end if page or post */ ?>

        <?php endwhile;/* end the main loop */ ?>

    <?php else : /* no posts found */ ?>

        <?php if (is_search()) : ?>

            <div class="post-container">
                <p>No results were found for your search "<?php echo get_search_query(); ?>". <a href="<?php bloginfo('url') ?>">Try the homepage</a> or search again:</p>
            </div>

        <?php else : ?>

            <?php include '404.php' ?>

        <?php endif ?>

    <?php endif; /* end if haveposts */ ?>


<?php /* footer */ get_footer(); ?>
