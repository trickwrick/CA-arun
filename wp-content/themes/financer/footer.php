<?php
/**
 * Footer Main File.
 *
 * @package FINANCER
 * @author  Template Path
 * @version 1.0
 */
global $wp_query;
$options = financer_WSH()->option();
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>
    
	<?php if( $options->get( 'show_scroltop' ) ){ ?>
    <!-- Scroll to Top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!--End Scroll to Top -->
    <?php } ?>
    
	<?php financer_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
	
</div>

<?php wp_footer(); ?>
</body>
</html>
