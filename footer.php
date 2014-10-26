<?php if (is_single()) : ?>

    <script>
        jQuery( document ).ready(function() {
            jQuery("#browse-submit").hide();
            jQuery("#further-reading #browse").change(function() {
                window.location = jQuery("#further-reading select option:selected").val();
            })
        });
    </script>
    <?php $currentTitle = get_the_title(); ?>
    <?php $args = array( 'numberposts' => '100' ); ?>
    <?php $recent_posts = get_posts( $args ); ?>
    <form id="further-reading" action="" method="post">
        <label for="browse">
            Browse posts: 
        </label>
        <select name="browse" id="browse">
            <?php foreach ($recent_posts as $post) : ?>
                <?php if (is_single()) : ?>
                    <option value="<?php the_permalink(); ?>"
                        <?php if ($currentTitle === get_the_title()) : ?>
                            selected="selected"
                        <?php endif ?>
                        >
                        <?php the_title(); ?>
                    </option>
                <? endif ?>
            <? endforeach ?>
        </select>
        <input type="submit" value="Go" id="browse-submit" />
    </form>

<?php endif ?>

</body>
</html>
