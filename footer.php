    <?php if (is_archive() || is_home() || is_single()) : ?>

        <div class="container-sm">
            <?php get_search_form(); ?>
        </div>

    <?php endif ?>

    <?php if (is_single()) : ?>
        <?php $currentId = get_the_id(); ?>
        <?php $args = array( 'numberposts' => get_option( 'posts_per_page' )); ?>
        <?php $recent_posts = get_posts( $args ); ?>

        <div class="container-sm">
            <h3>Browse posts:</h3>
            <ul>
                <?php foreach ($recent_posts as $post) : ?>
                    <?php if (is_single() && $currentId != get_the_id()) : ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <? endif ?>
                <? endforeach ?>
            </ul>
        </div>

    <?php endif ?>

    </div>

<?php wp_footer() ?>

</body>
</html>
