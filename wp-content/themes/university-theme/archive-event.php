<?= get_header() ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>

    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Events</h1>
        <div class="page-banner__intro">
            <p>See the uncoming events in our community.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    while (have_posts()) {
        the_post();
    ?>
        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title">
                <a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
            </h2>

            <div class="metabox">
                <p><?= the_date(); ?></p>
            </div>

            <div class="generic-content">
                <?= the_excerpt(); ?>

                <p><a class="btn btn--blue" href="<?= the_permalink(); ?>">Continue reading &raquo;</a></p>
            </div>
        </div>
    <?php
    }

    echo paginate_links();
    ?>
</div>
<? get_footer() ?>