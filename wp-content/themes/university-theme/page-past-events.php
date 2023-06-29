<?= get_header() ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Past Events</h1>
        <div class="page-banner__intro">
            <p>A recap of our past events.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    $today = date('Ymd');

    $pastEvents = new WP_Query([
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'order' => 'DESC',
        'orderby' => 'meta_value_num',
        'meta_key' => 'event_date',
        'meta_query' => [
            'key' => 'event_date',
            'compare' => '<',
            'value' => $today,
            'type' => 'numeric'
        ]
    ]);

    while ($pastEvents->have_posts()) {
        $pastEvents->the_post();

        $eventDate = new DateTime(get_field('event_date'));
    ?>
        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title">
                <a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
            </h2>

            <div class="metabox">
                <p><?= $eventDate->format('F d, Y') ?></p>
            </div>

            <div class="generic-content">
                <?= the_excerpt(); ?>

                <p><a class="btn btn--blue" href="<?= the_permalink(); ?>">Continue reading &raquo;</a></p>
            </div>
        </div>
    <?php
    }

    echo paginate_links([
        'total' => $pastEvents->max_num_pages,
    ]);
    ?>
</div>

<? get_footer() ?>