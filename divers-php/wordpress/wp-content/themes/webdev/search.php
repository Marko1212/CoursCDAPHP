<?php get_header() ?>

<?php if(have_posts()): //  proveri ima li post ?>

<?php while(have_posts()): the_post(); ?>
    <h1><?php the_title() ?></h1>
    <p><?php the_category(', ') ?><?php the_date() ?></p>
    <div><?php the_content() ?></div>
<?php endwhile ?>

<?php else: // ako nema ?>

<p>Nema rezultata.</p>

<?php endif; ?>

<?php get_footer() ?>