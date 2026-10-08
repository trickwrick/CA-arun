<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access directly. ?>

<div class="wrap to-wrap">

    <div class="to-admin-page-header">

        <div class="to-admin-page-header-text">
            <h1>
                <?php esc_html_e('Welcome to Finaxio!', 'finaxio'); ?>
            </h1>
            <p>
                <?php esc_html_e('Finaxio is a Business and Finance Consulting WordPress Theme', 'finaxio'); ?>
            </p>
        </div>

        <div class="to-admin-page-header-logo">
            <img src="<?php echo get_theme_file_uri('inc/admin/assets/img/icon.svg'); ?>" />
        </div>
    </div>

    <div class="to-admin-boxes">

        <div class="to-admin-box">

            <div class="to-admin-box-header">
                <h2>
                    <?php esc_html_e('Documentation', 'finaxio'); ?>
                </h2>
            </div>

            <div class="to-admin-box-inside">
                <p>
                    <?php esc_html_e('You can find everything about theme functionality.', 'finaxio'); ?>
                </p>
                <a href="https://docs.themeori.com/envato/finaxio/" target="_blank" class="button">
                    <?php esc_html_e('Go to Documentation', 'finaxio'); ?>
                </a>
            </div>

        </div>

        <div class="to-admin-box">

            <div class="to-admin-box-header">
                <h2>
                    <?php esc_html_e('Finaxio Support', 'finaxio'); ?>
                </h2>
            </div>

            <div class="to-admin-box-inside">
                <p>
                    <?php esc_html_e('Do you need help? Feel to free ask any question.', 'finaxio'); ?>
                </p>
                <a href="https://docs.themeori.com/envato/finaxio/help-and-support/" target="_blank"
                    class="button"><?php esc_html_e('Go to Support Page', 'finaxio'); ?></a>
            </div>

        </div>

    </div>

</div>