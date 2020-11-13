<?php get_header() ?>
<?php if(have_posts()): //  proveri ima li post ?>
<?php else: // ako nema ?>
<?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; // redirektuj na stranu greske ?>
<?php endif; ?>
<?php while(have_posts()): the_post(); ?>
    <h1><?php the_title() ?></h1>
    <div><?php the_content() ?></div>
<?php endwhile ?>
<?php get_footer() ?>