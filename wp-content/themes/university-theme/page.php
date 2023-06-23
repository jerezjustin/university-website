<?php
get_header();

while (have_posts()) {
    the_post()
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg') ?>)"></div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?= the_title() ?></h1>
            <div class="page-banner__intro">
                <!-- TODO: Replace subtitle for internal page layout -->
                <p>Learn how the school of your dreams got started.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <?php
        $parentId = wp_get_post_parent_id(get_the_ID());

        if ($parentId) {
        ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?= get_permalink($parentId) ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Back to <?= get_the_title($parentId) ?>
                    </a>

                    <span class="metabox__main"><?= the_title() ?></span>
                </p>
            </div>
        <?php
        }

        if ($parentId or get_pages(['child_of' => get_the_ID()])) {
        ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?= get_permalink($parentId) ?>"><?= get_the_title($parentId) ?></a></h2>

                <ul class="min-list">
                    <?php
                    if ($parentId) {
                        $childrenOf = $parentId;
                    } else {
                        $childrenOf = get_the_ID();
                    }

                    wp_list_pages([
                        'title_li' => NULL,
                        'child_of' => $childrenOf,
                        'sort_column' => 'menu_order'
                    ]);
                    ?>
                </ul>
            </div>
        <?php } ?> 

        <div class="generic-content">
            <?= the_content() ?>
        </div>
    </div>
<?php
}

get_footer();
