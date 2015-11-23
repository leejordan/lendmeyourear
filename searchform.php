<form class="form-group" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <label for="search"><h3>Search posts:</h3></label>
    <input class="form-control" type="search" id="search" value="<?php echo get_search_query() ?>" name="s" aria-required="true" required />
    <button type="submit" class="btn"/><?php echo esc_attr_x( 'Search', 'submit button' ) ?></button>
</form>
