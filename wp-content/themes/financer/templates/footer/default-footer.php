<?php
/**
 * Footer Template  File
 *
 * @package FINANCER
 * @author  Template Path
 * @version 1.0
 */

$options = financer_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>
    
    <!-- Main Footer -->
    <footer class="main_footer">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
        <div class="footer_top">
            <div class="container">
                <div class="widget_style">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?> 
                </div>
            </div>
        </div>
        <?php } ?>
        
		<?php if($options->get('footer_copyright_text')){ ?>
        <div class="footer_bottom">
            <div class="container">
                <div class="copyright"><?php echo wp_kses($options->get('footer_copyright_text'), true); ?></div>
            </div>
        </div>
        <div class="footer_shape"></div>
        <?php } ?>
    </footer>
    <!-- End Main Footer -->