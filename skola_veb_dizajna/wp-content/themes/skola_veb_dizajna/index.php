
<?php get_header(); ?>

<!-- header -->
<header class="onamaHeader d-flex justify-content-center align-items-center">
    <h1 class="text-white container text-center">Blog</h1>
</header>

<!-- blogPosts -->
<section class="blogPosts container py-5">
    <article class="row justify-content-around">
        <div class="col-md-7">
            <div class="post shadow-lg">
                <div class="featuredImage">
                    <img class="img-fluid" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/blog1.jpg" alt="">
                </div>
                <div class="text">
                    <h3>Na pocetku bese ideja</h3>
                    <p class="meta">23.06.2021. | <a href="">Admin</a></p>
                    <p class="excerpt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor voluptas reiciendis dignissimos debitis. Illo fugit tempora, deleniti facere consectetur ratione commodi possimus. Laborum nesciunt esse numquam error animi eum repudiandae aut sequi molestiae. Incidunt et a ab blanditiis veniam dicta iusto impedit esse! Maxime reiciendis ducimus excepturi qui? Nemo officia illum magni id eveniet laboriosam!</p>
                    <a href="">Ceo tekst</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget shadow-lg">
                <h3>Kategorije</h3>
                <ul>
                    <li><a href="">HTML i CSS</a></li>
                    <li><a href="">Bootstrap</a></li>
                    <li><a href="">WordPress</a></li>
                    <li><a href="">JS</a></li>
                    <li><a href="">PHP</a></li>
                </ul>
            </div>
            <div class="widget shadow-lg">
                <h3>Mapa sajta</h3>
                <ul>
                    <li><a href="">O nama</a></li>
                    <li><a href="">Naslovna</a></li>
                    <li><a href="">Kursevi</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </article>
</section>

<?php  get_footer(); ?>