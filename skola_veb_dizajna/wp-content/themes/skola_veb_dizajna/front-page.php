<?php get_header(); ?>

<!-- header -->
<header class="mainHeader py-5">
    <article class="
            container
            d-flex
            justify-content-center
            flex-column
            text-white text-center
        ">
        <div class="row mb-5">
            <div class="col-md-6 mx-auto text-center">
                <h1><?php the_field('naslov_u_headeru'); ?></h1>
                <p class="lead">
                    <?php the_field('podnaslov_u_headeru'); ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4 p-4 rounded-lg">
                <h3><?php the_field('tehnologija_1'); ?></h3>
                <a href="<?php the_field('tehnologije_link_1'); ?>"><?php the_field('tehnologije_tekst_linka'); ?> &gt;</a>
            </div>
            <div class="col-md-4 p-4 rounded-lg">
                <h3><?php the_field('tehnologija_2'); ?></h3>
                <a href="<?php the_field('tehnologije_link_2'); ?>"><?php the_field('tehnologije_tekst_linka'); ?> &gt;</a>
            </div>
            <div class="col-md-4 p-4 rounded-lg">
                <h3><?php the_field('tehnologija_3'); ?></h3>
                <a href="<?php the_field('tehnologije_link_3'); ?>"><?php the_field('tehnologije_tekst_linka'); ?> &gt;</a>
            </div>
        </div>
    </article>
</header>

<!-- onama -->
<section class="onama container py-5">
    <h2 class="text-center">O nama</h2>
    <p class="text-center">
        Naša misija pomoć u obuci i pronalaženju prvog posla.
    </p>
    <article class="row justify-content-around pt-5">
        <div class="col-md-6 shadow-lg p-5">
            <h4>Prvi korak je naučiti</h4>
            <p>
                Naša preporuka je svakako da prvo energiju usmerite na sticanje
                znanja i da prvo naučite, a onda krenete u potragu za poslom.
            </p>
        </div>
        <div class="col-md-6 shadow-lg p-5">
            <h4>Drugi korak je posao</h4>
            <p>
                U ovom fazi težite ka daljem napredovanju i tragate za poslom,
                ne odustajete već pokušavate da se nametnete tamo gde treba.
            </p>
        </div>
    </article>
</section>

<!-- kursevi -->
<section class="kursevi">
    <h2 class="text-center text-white">Programi</h2>
    <article class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img class="img-fluid" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">HTML nedelja</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <button>Saznaj vise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img class="img-fluid" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">CSS nedelja</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <button>Saznaj vise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img class="img-fluid" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">JS nedelja</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <button>Saznaj vise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img class="img-fluid" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">WP nedelja</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <button>Saznaj vise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

<!-- blog -->
<section class="blog py-5">
    <h2 class="text-center">Blog</h2>
    <article class="container owl-carousel owl-theme mt-5">
        <div class="item">
            <div class="card">
                <div class="holder">
                    <img class="card-img-top" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="">
                </div>
                <div class="meta">
                    <p>22.06.2021 | <a href="">Admin</a></p>
                </div>
                <div class="card-body">
                    <h4>Na pocetku bese ideja</h4>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nemo ex maiores sit, rerum, hic officiis vel nostrum corrupti adipisci animi quaerat ea fuga possimus eveniet accusamus fugit inventore in voluptatem aliquam. Amet, numquam in libero impedit, provident eligendi distinctio neque officia ipsum odit cumque facilis inventore velit. Asperiores esse cumque, quaerat voluptate labore facilis.
                    </p>
                    <button>Ceo tekst</button>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="holder">
                    <img class="card-img-top" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="">
                </div>
                <div class="meta">
                    <p>22.06.2021 | <a href="">Admin</a></p>
                </div>
                <div class="card-body">
                    <h4>Blog 2</h4>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nemo ex maiores sit, rerum, hic officiis vel nostrum corrupti adipisci animi quaerat ea fuga possimus eveniet accusamus fugit inventore in voluptatem aliquam. Amet, numquam in libero impedit, provident eligendi distinctio neque officia ipsum odit cumque facilis inventore velit. Asperiores esse cumque, quaerat voluptate labore facilis.
                    </p>
                    <button>Ceo tekst</button>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <div class="holder">
                    <img class="card-img-top" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="">
                </div>
                <div class="meta">
                    <p>22.06.2021 | <a href="">Admin</a></p>
                </div>
                <div class="card-body">
                    <h4>Blog 3</h4>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nemo ex maiores sit, rerum, hic officiis vel nostrum corrupti adipisci animi quaerat ea fuga possimus eveniet accusamus fugit inventore in voluptatem aliquam. Amet, numquam in libero impedit, provident eligendi distinctio neque officia ipsum odit cumque facilis inventore velit. Asperiores esse cumque, quaerat voluptate labore facilis.
                    </p>
                    <button>Ceo tekst</button>
                </div>
            </div>
        </div>
    </article>
</section>

<!-- utisci -->

<!-- utisci -->
<section class="utisci">
    <article class="container">
        <div class="row">
            <div class="col-md-4 align-self-center">
                <h3 class="text-white">Utisci polaznika</h3>
            </div>
            <div class="col-md-8 owl-carousel owl-theme">
                <div class="item">
                    <p>„Kao sto je struja sinonim za Teslu, dovoljno je reći radionice Web dizajna, da nas asocira na predavača Slobodana Mirića koji svakodnevno deli svoje znanje, vreme, volju i energiju, da sve vredne i zantiželjne uvede u praktičnu primenu stečenih znanja sa radionica HTML, CSS, Bootstrap, JS, jQuery, PHP, WordPress…."</p>
                    <h5>Katarina Nikolić</h5>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/katarina.jpg" alt="">
                </div>
                <div class="item">
                    <p>Učeći od Slobe je bilo pravo zadovoljstvo. Ume da prenese znanje, nesebično daje dodatne časove – jer sve mora da bude jasno do kraja. Pohađala sam radionice "30 dana kodiranja", WP, Custom Themes.</p>
                    <h5>Dušica Antanasijevic-Ilić</h5>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/dusica.jpg" alt="">
                </div>
                <div class="item">
                    <p>Posle samo mesec dana, ja sam sposoban da napravim web sajt koji se ni malo ne razlikuje po danasnjim modernim sajtovima koji se susrecu svakodnevno. Zahvaljujuci nasem mentoru Slobodanu Miricu koji odlicno prenosi znanje i koji je uporan da pomogne svakome da li ga poznaje ili ne…sto je danas retkost.</p>
                    <h5>Andreja Marković</h5>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/andreja.jpg" alt="">
                </div>
                <div class="item">
                    <p>Iskreno receno Slobodan je najbolji predavac od koga sam ucio i dosta naucio za samo mesec dana! Pohadjao sam razne online kurseve,zavrsio sam IT Akademiju i vise sam naucio na radionici sa Slobodanom nego za godinu dana na IT Akademiji! Topla preporuka za kurseve sa ovim sjanim predavacem! </p>
                    <h5>Filip Jotić</h5>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/filip.jpg" alt="">
                </div>
            </div>
        </div>
    </article>
</section>

<?php get_footer(); ?>