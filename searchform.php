<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="form-group">
        <label for="search"><?php echo _x( 'Search for:', 'label' ) ?></label>
        <input type="search" id="search" class="search-field form-control" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <button type="submit" class="search-submit btn btn-submit"/><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
</form>
