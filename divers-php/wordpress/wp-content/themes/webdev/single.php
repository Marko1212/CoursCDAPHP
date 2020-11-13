<?php get_header() ?>
<?php if(have_posts()): //  proveri ima li post ?>
<?php else: // ako nema ?>
<?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; // redirektuj na stranu greske ?>
<?php endif; ?>
<?php while(have_posts()): the_post(); ?>
    <h1><?php the_title() ?></h1>
    <p><?php the_category(', ') ?> <?php the_date() ?> by <?php the_author() ?></p>
    <div><?php the_content() ?></div>
<?php endwhile ?>
<?php get_template_part('sidebar'); ?>
<?php get_footer() ?>