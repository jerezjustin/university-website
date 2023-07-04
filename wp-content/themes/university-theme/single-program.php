<?php

get_header();

while (have_posts()) {
    the_post();
?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?= the_title(); ?></h1>
            <div class="page-banner__intro">
                <!-- TODO: Replace subtitle for internal page layout -->
                <p>See all the programs we offer.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?= get_post_type_archive_link('program'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    All Programs
                </a>

                <span class="metabox__main"><?= the_title(); ?></span>
            </p>
        </div>

        <div class="generic-content">
            <?= the_content(); ?>
        </div>

        <?php
        $today = date('Ymd');

        $recentEvents = new WP_Query([
            'post_per_page' => 2,
            'post_type' => 'event',
            'order' => 'ASC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'event_date',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ],
                [
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                ]
            ]
        ]);

        if ($recentEvents->have_posts()) {
        ?>
            <hr class="section-break" />

            <h2 class="headline headline--small">Upcoming Events</h2>
        <?php
        }

        while ($recentEvents->have_posts()) {
            $recentEvents->the_post();

            $eventDate = new DateTime(get_field('event_date'));
        ?>

            <div class="event-summary">
                <a class="event-summary__date t-center" href="<?= the_permalink(); ?>">
                    <span class="event-summary__month"><?= $eventDate->format('M'); ?></span>
                    <span class="event-summary__day"><?= $eventDate->format('d'); ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h5>
                    <p>
                        <?php echo has_excerpt()
                            ? the_excerpt()
                            : wp_trim_words(get_the_content(), 18); ?>
                        <a href="<?= the_permalink(); ?>" class="nu gray">Learn more</a>
                    </p>
                </div>
            </div>

        <?php
            wp_reset_postdata();
        }
        ?>
    </div>
<?php
}

get_footer();
