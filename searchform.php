<form class="grid grid--justify-space-between" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <label class="grid__col-12 grid__col--bleed" for="search"><h3>Search posts:</h3></label>
    <input type="search" id="search" class="grid__col-8" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="grid__col-4 grid--align-center btn btn-square"/><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
</form>
