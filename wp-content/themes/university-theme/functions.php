<?php

declare(strict_types=1);

function university_resources(): void
{
    // Loading styles
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

    // Loading scripts
    wp_enqueue_script('university_main_scripts', get_theme_file_uri('/build/index.js'), ['jquery'], '1.0', true);
}

function university_features(): void
{
    register_nav_menu('headerMenu', 'Header Menu');
    register_nav_menu('footerMenuFirstColumn', 'Footer Menu - First Column');
    register_nav_menu('footerMenuSecondColumn', 'Footer Menu - Second Column');

    add_theme_support('title-tag');
}

add_action('wp_enqueue_scripts', 'university_resources');
add_action('after_setup_theme', 'university_features');
