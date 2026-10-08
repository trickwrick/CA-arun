<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

CSF::createWidget('csf_cta_image_widget', array(
    'title'       => esc_html__('CTA Image - finaxio', 'finaxio-toolkit'),
    'classname'   => 'csf-cta-widget',
    'description' =>  esc_html__('This Widget for CTA Image - finaxio', 'finaxio-toolkit'),
    'fields'      => array(

        array(
            'id'          => 'select_design',
            'type'        => 'select',
            'title'       => esc_html__('Design Style', 'finaxio-toolkit'),
            'placeholder' => esc_html__('Select an option', 'finaxio-toolkit'),
            'options'     => array(
                'design-1'  => 'Design 1',
                'design-2'  => 'Design 2',
            ),
            'default'     => 'design-1'
        ),

        array(
            'id'            => 'icon',
            'type'          => 'media',
            'title'         => esc_html__('Icon Image', 'finaxio-toolkit'),
            'library'       => 'image',
            'url'           => false,
            'button_title'  => esc_html__('Upload', 'finaxio-toolkit'),
        ),

        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'finaxio-toolkit'),
            'default' => esc_html__('Always ready for help', 'finaxio-toolkit'),
        ),

        array(
            'id'      => 'btn_text',
            'type'    => 'text',
            'title'   => esc_html__('Button Text', 'finaxio-toolkit'),
            'default' => esc_html__('get quote', 'finaxio-toolkit'),
        ),

        array(
            'id'      => 'btn_url',
            'type'    => 'text',
            'title'   => esc_html__('Button URL', 'finaxio-toolkit'),
            'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
        ),

        array(
            'id'            => 'bg_image',
            'type'          => 'media',
            'title'         => esc_html__('BG Image', 'finaxio-toolkit'),
            'library'       => 'image',
            'url'           => false,
            'button_title'  => esc_html__('Upload', 'finaxio-toolkit'),
        ),

    )
));
if (!function_exists('csf_cta_image_widget')) {
    function csf_cta_image_widget($args, $instance)
    {

        echo $args['before_widget'];

        $icon = isset($instance['icon']) ? $instance['icon'] : '';
        $bg_image = isset($instance['bg_image']) ? $instance['bg_image'] : '';

        $select_design = isset($instance['select_design']) ? $instance['select_design'] : '';

        if (!empty($bg_image['url']) && !empty($select_design)) :

            if ('design-1' === $select_design) :
                ?>
                <div class="all__sidebar-help">
                    <div class="all__sidebar-help-image">
                        <img class="img__full" src="<?php echo esc_url($bg_image['url']); ?>" alt="bg">
                        <div class="all__sidebar-help-image-content">
                            <?php if (!empty($icon['url'])) { ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="icon">
                            <?php } ?>
                            <h4><?php echo esc_html($instance['title']); ?></h4>
                            <a class="btn-one" href="<?php echo esc_url($instance['btn_url']); ?>"><?php echo esc_html($instance['btn_text']); ?> <i class="far fa-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ('design-2' === $select_design) : ?>
    
                <div class="all__sidebar-item-help" data-background="<?php echo esc_url($bg_image['url']); ?>">
							<img class="all__sidebar-item-help-shape" src="<?php echo esc_url($icon['url']); ?>" alt="">
                            <h4><?php echo esc_html($instance['title']); ?></h4>
                            <div class="all__sidebar-item-help-contact">
                                <i class="flaticon-phone-call"></i>
                                <div class="all__sidebar-item-help-contact-content">
                                    <span>Quick Help</span>
                                    <h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
                                </div>
                            </div>
						</div>
            <?php endif; ?>

        <?php
        endif;
        echo $args['after_widget'];
    }
}
