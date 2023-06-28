<?php

declare(strict_types=1);

function university_post_types(): void
{
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
