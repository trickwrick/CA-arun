<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

CSF::createWidget('csf_download_widget', array(
    'title' => esc_html__('Download Info - finaxio', 'finaxio-toolkit'),
    'classname' => 'csf-download-widget',
    'description' => esc_html__('This Widget for Download Info - finaxio', 'finaxio-toolkit'),
    'fields' => array(

        array(
            'id' => 'title',
            'type' => 'text',
            'title' => esc_html__('Title', 'finaxio-toolkit'),
            'default' => esc_html__('Download', 'finaxio-toolkit'),
        ),

        array(
            'id' => 'one_logo',
            'type' => 'media',
            'title' => esc_html__('Icon', 'finaxio-toolkit'),
            'library' => 'image',
            'url' => false,
            'button_title' => esc_html__('Upload', 'finaxio-toolkit'),
            'default' => array(
                'url' => get_theme_file_uri('assets/img/icon/pdf.png'),
                'thumbnail' => get_theme_file_uri('assets/img/icon/pdf.png'),
            ),
        ),

        array(
            'id' => 'btn_text_one',
            'type' => 'text',
            'title' => esc_html__('PDF Button', 'finaxio-toolkit'),
            'default' => esc_html__('Our Brochures', 'finaxio-toolkit'),
        ),

        array(
            'id' => 'btn_url_one',
            'type' => 'text',
            'title' => esc_html__('PDF URL', 'finaxio-toolkit'),
            'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
        ),

        array(
            'id' => 'two_logo',
            'type' => 'media',
            'title' => esc_html__('Icon', 'finaxio-toolkit'),
            'library' => 'image',
            'url' => false,
            'button_title' => esc_html__('Upload', 'finaxio-toolkit'),
            'default' => array(
                'url' => get_theme_file_uri('assets/img/icon/document.png'),
                'thumbnail' => get_theme_file_uri('assets/img/icon/document.png'),
            ),
        ),

        array(
            'id' => 'btn_text_two',
            'type' => 'text',
            'title' => esc_html__('Company Button', 'finaxio-toolkit'),
            'default' => esc_html__('Company Details', 'finaxio-toolkit'),
        ),

        array(
            'id' => 'btn_url_two',
            'type' => 'text',
            'title' => esc_html__('Company File URL', 'finaxio-toolkit'),
            'default' => esc_attr__('http://google.com', 'finaxio-toolkit'),
        ),
    )
)
);


if (!function_exists('csf_download_widget')) {
    function csf_download_widget($args, $instance)
    {

        echo $args['before_widget'];

        $widget_title = $instance['title'];
        $one_logo = $instance['one_logo'];
        $two_logo = $instance['two_logo'];
        ?>

        <h2>
            <?php echo esc_html($widget_title); ?>
        </h2>
        <div class="all__sidebar-item-materials">
            <ul>
                <li><a href="<?php echo esc_url($instance['btn_url_one']); ?>">
                        <i class="fas fa-file-pdf"></i>
                        <?php echo esc_html($instance['btn_text_one']); ?> <span class="fal fa-download"></span>
                    </a></li>
                <li><a href="<?php echo esc_url($instance['btn_url_two']); ?>">
                        <i class="fas fa-file-image"></i>
                        <?php echo esc_html($instance['btn_text_two']); ?> <span class="fal fa-download"></span>
                    </a></li>
            </ul>
        </div>

        <?php
        echo $args['after_widget'];
    }
}