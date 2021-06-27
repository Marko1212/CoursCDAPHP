<?php get_header(); ?>

<!-- header -->
<header class="onamaHeader d-flex justify-content-center align-items-center">
    <h1 class="text-white container text-center"><?php the_title(); ?></h1>
</header>

<!-- blogPosts -->
<section class="blogPosts container py-5">
    <article class="row justify-content-around">
        <div class="col-md-7">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post shadow-lg">
                        <div class="featuredImage">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="text">
                            <h3><?php the_title(); ?></h3>
                            <p class="meta"><?php echo get_the_date(); ?> | <a href=""><?php the_author(); ?></a></p>
                            <p class="excerpt"><?php the_content(); ?></p>
                        </div>
                    </div>
                <?php endwhile;
            else :  ?>
                <?php _e('Nema unetih postova'); ?>
            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </article>
</section>

<?php get_footer(); ?>