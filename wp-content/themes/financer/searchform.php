<?php
/**
 * Search Form template
 *
 * @package FINANCER
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="sidebar_search_box">
    <form class="search-form" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'financer' ); ?>" required>
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
</div>
