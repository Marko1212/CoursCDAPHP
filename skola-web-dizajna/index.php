<?php include "header.php"; ?>

<!-- header -->
<header class="mainHeader py-5">
    <article
        class="
            container
            d-flex
            justify-content-center
            flex-column
            text-white text-center
        "
    >
        <div class="row mb-5">
            <div class="col-md-6 mx-auto text-center">
                <h1>Škola veb dizajna</h1>
                <p class="lead">
                    će vam pomoći da za najkraće vreme postanete <br />
                    veb dizajner, front end developer ili WordPress developer
                </p>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4 p-4 rounded-lg">
                <h3>HTML i CSS</h3>
                <a href="">Saznaj vise &gt;</a>
            </div>
            <div class="col-md-4 p-4 rounded-lg">
                <h3>WordPress</h3>
                <a href="">Saznaj vise &gt;</a>
            </div>
            <div class="col-md-4 p-4 rounded-lg">
                <h3>Javascript i PHP</h3>
                <a href="">Saznaj vise &gt;</a>
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
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="img/blog1.jpg" class="img-fluid" alt="..." />
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    This is a wider card with supporting text
                                    below as a natural lead-in to additional
                                    content. This content is a little bit
                                    longer.
                                </p>
                               <button>Saznaj vise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

<?php include "footer.php"; ?>
