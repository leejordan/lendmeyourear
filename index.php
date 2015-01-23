<?php get_header(); ?>


    <?php /* begin the loop */ if (have_posts()) : ?>

    <?php if (!is_page() && !is_single()) : ?>

        <div class="panel-container">

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

            <?php if ( has_post_thumbnail() && !get_post_meta($post->ID, 'custom-header', true) ) the_post_thumbnail('large'); ?>
            <div class="post-container">
                <?php echo get_post_meta($post->ID, 'custom-header', true) ?>
                <?php echo get_post_meta($post->ID, 'custom-markup', true) ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content('Read more &gt;'); ?>
                <hr>
                <p>
                    Posted on: <?php the_date(); ?>
                    <br>Tagged: <?php echo get_the_tag_list( null, ', ', null ); ?>
                </p>
            </div>
            <div class="highlight-container">
                <div class="footer-container">
                    <div class="clearfix"></div>
                    <?php comments_template(null, true); ?>
                </div>
            </div>

        <?php else : /* show post titles */ ?>

            <a tabindex="3" class="panel" href="<?php the_permalink() ?>" data-tags="<?php foreach (get_the_tags() as $tag) { echo $tag->name . " "; } ?>">
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

    <?php if (!is_page() && !is_single()) : ?>

        </div>

    <? endif ?>

    <?php if (!is_single() && !is_page()) : ?>

        </div>

    <? endif ?>

    <?php else : /* show page not found message */ ?>

    <div class="post-container">

        <h1>Page not found</h1>

        <p>Sorry, the page you are looking for is not available. Maybe it moved. Maybe it was never here in the first place. Maybe you imagined the whole thing.</p>
        <p><a class="btn btn-external" href="<?php bloginfo('url') ?>">take me to the homepage</a></p>

    </div>

    <?php endif; /* end if have_posts */ ?>


<?php /* footer */ get_footer(); ?>
