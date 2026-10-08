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

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <fieldset>
            <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Type your keyword and hit', 'financer' ); ?>" required >
            <button type="submit"><i class="icon-50"></i></button>
        </fieldset>
    </div>
</form>