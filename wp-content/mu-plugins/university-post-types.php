<?php

declare(strict_types=1);

function university_post_types(): void
{
    register_post_type('program', [
        'rewrite' => ['slug' => 'programs'],
        'has_archive' => true,
        'supports' => ['title', 'editor'],
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'labels' => [
            'name' => 'Programs',
            'add_new_item' => 'Add New Program',
            'edit_item' => 'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ],
        'show_in_rest' => true
    ]);

    register_post_type('event', [
        'rewrite' => ['slug' => 'events'],
        'has_archive' => true,
        'supports' => ['title', 'editor', 'excerpt'],
        'public' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'labels' => [
            'name' => 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ],
        'show_in_rest' => true
    ]);
}

add_action('init', 'university_post_types');
