<?php include('header.php'); ?>

<!-- header -->
<header class="mainHeader">
    <img src="img/header.jpg" alt="" />
    <h1>Muzički blog</h1>
</header>
<!-- main content -->

<main class="container">
    <section>
        <article class="post">
            <div class="featuredImage">
                <a href="blog1.php"><img src="img/blog1.jpg" alt="" /></a>
            </div>
            <div class="text">
                <h2>Blog 1</h2>
                <p class="meta">Admin | 3.01.2022.</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Earum tempore et dolor aliquam explicabo
                    aperiam tenetur aliquid rerum cumque necessitatibus!
                </p>
                <a href="blog1.php" class="btn">Ceo tekst</a>
            </div>
        </article>
        <article class="post">
            <div class="featuredImage">
                <a href="blog2.php"><img src="img/blog2.jpg" alt="" /></a>
            </div>
            <div class="text">
                <h2>Blog 2</h2>
                <p class="meta">Admin | 3.01.2022.</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Earum tempore et dolor aliquam explicabo
                    aperiam tenetur aliquid rerum cumque necessitatibus!
                </p>
                <a href="blog2.php" class="btn">Ceo tekst</a>
            </div>
        </article>
        <article class="post">
            <div class="featuredImage">
                <a href="blog3.php"><img src="img/blog3.jpg" alt="" /></a>
            </div>
            <div class="text">
                <h2>Blog 3</h2>
                <p class="meta">Admin | 3.01.2022.</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Earum tempore et dolor aliquam explicabo
                    aperiam tenetur aliquid rerum cumque necessitatibus!
                </p>
                <a href="blog3.php" class="btn">Ceo tekst</a>
            </div>
        </article>
    </section>
    <?php include('sidebar.php'); ?>
</main>

<?php include('footer.php'); ?>