<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php get_template_part('header/landing-header'); ?>

    <h1>This is heading in index.php</h1>
    <p>We got blogname by using <b>bloginfo</b> function. This blog name is <span style="color: red;"> <?php bloginfo('name')?> </span>This is set by using</p>
</body>
</html>