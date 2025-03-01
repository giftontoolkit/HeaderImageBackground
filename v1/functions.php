<?php
// Add Theme Customization Options
function myTM_customize_register_header_image_background($wp_customize) {

    // Creating Header-Image
    $wp_customize->add_section('myTM_background_section', array(
        'title' => __('Header Image Background', 'myTM-theme'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('header_bg_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    // Saving Header-Image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_bg_image', array(
        'label' => __('Header Image Background', 'myTM-theme'),
        'section' => 'myTM_background_section',
        'settings' => 'header_bg_image',
    )));
}
add_action('customize_register', 'myTM_customize_register_header_image_background');

// Apply Customizations via Inline CSS
function myTM_header_image_backgound() {
    ?>
    <style type="text/css">
        .landing-header {
            background-image: url(<?php echo esc_url(get_theme_mod('header_bg_image', '')); ?>);
        }
    </style>
    <?php
}
add_action('wp_head', 'myTM_header_image_backgound');
?>