<?php get_header() ?>

    <header>
        <h1><?= get_bloginfo( 'name' ) ?></h1>    
        <p><?= get_bloginfo( 'description' ) ?></p>
    </header>

    <?php
    if(have_posts()): // Ukoliko ima clanaka
    while(have_posts()) :  // Petlja za uzimanje clanaka
    the_post(); // Podaci o clanku
    ?>

    <article>
        <h1>
            <a href="<?php the_permalink(); // link do clanka ?>">
                <?php the_title(); // naslov clanka ?>
            </a>
        </h1>
        <p>
            <?php the_excerpt(  '(...)' ); // opis do "Read more" dela ?>
        </p>
    </article>

    <?php
    endwhile;
    endif;  ?>

<?php get_footer() ?>