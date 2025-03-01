# Header Image in Background

# Version 1 (v1)

- In this version, we introduce below two functions in `functions.php` file. You can see outputs, after applying these two functions.
- First function has two parts. One is for `background` and other is for `text`.
- In second function, I accessed `CSS-Class` of the `landing-header.php` and then styled according to `Color-Customization` tab.
- we used `wp_header()`. This hook is used by WordPress, plugins, and your theme to:
  - Load CSS stylesheets.
  - Add inline CSS (like myTM_custom_styles() function).
  - Include JavaScript scripts.
  - Add meta tags (e.g., for SEO).
  - Load other essential header elements.

# Code neccessary in `index.php`

use of wp_header(). So that we can trigger inline-CSS.

```ruby
<?php wp_head(); ?>
```

# Code `functions.php` File

```ruby
<?php
// Add Theme Customization Options
function myTM_customize_register($wp_customize) {
    // Backgroud-Color Customization
    // Creating Background-Color
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving Background-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label' => __('Header Background Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'header_background_color',
    )));

    // Text-Color Customization
    // Creating Text-Color
    $wp_customize->add_setting('text_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Saving Text-Color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'myTM-theme'),
        'section' => 'colors',
        'settings' => 'text_color',
    )));
}
add_action('customize_register', 'myTM_customize_register');


// Apply Customizations via Inline CSS
function myTM_custom_styles() {
    ?>
    <style type="text/css">
        .landing-header {
            background-color: <?php echo esc_attr(get_theme_mod('header_background_color', '#2c3e50')); ?>;
            color: <?php echo esc_attr(get_theme_mod('text_color', '#ecf0f1')); ?>;
            background-size: cover;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'myTM_custom_styles');

?>
```

# Output Before Functions

![Output image before applying functions.php](/images/before_function.jpg)

# Output After Functions

![Output image after applying functions.php 1](/images/after_function_1.jpg)
![Output image after applying functions.php 2](/images/after_function_2.jpg)
