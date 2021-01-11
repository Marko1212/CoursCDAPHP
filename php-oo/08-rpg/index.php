<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Play Game (RPG)</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    spl_autoload_register();

    use Rpg\Chasseur;
    use Rpg\Objet;
    use Rpg\Potion;
    use Rpg\Magicien;
    use Rpg\Guerrier;
    use Rpg\Personnage;
    use Rpg\Sword;

    $aragorn = new Guerrier('Aragorn');
    $legolas = new Chasseur('Legolas');
    $gandalf = new Magicien('Gandalf');

    $merlin = new Magicien('Merlin');

    $lebonchasseur = new Chasseur('Le bon chasseur');

    $aragorn->attaquer($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
    $legolas->attaquer($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
    $gandalf->attaquer($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)

    // Les personnages peuvent ramasser des objets
    $potion = new Objet('Potion');
    $sword = new Objet('Andùril');
    $arc = new Objet('Arc');
    $potion = new Potion();
    $sword = new Sword('Andùril', 5);

    $aragorn->pick($potion)->pick($sword);
    $legolas->pick($arc);

    $aragorn->consume($potion);
    $aragorn->equip($sword);

    $aragorn->attaquer($legolas)
        ->attaquer($legolas)
        ->attaquer($legolas);


    $aragorn->attaquer($merlin)
        ->attaquer($merlin)
        ->attaquer($merlin)
        ->attaquer($merlin);

    $aragorn->attaquer($lebonchasseur)
        ->attaquer($lebonchasseur)
        ->attaquer($lebonchasseur);

    // Tableau avec les personnages
    $personnages = Personnage::getList();
    ?>

    <div class="container">
        <div class="row">
            <?php foreach ($personnages as $personnage) { ?>
                <div class="col-lg-4 bg-dark">
                    <h1><?= $personnage->getNom(); ?></h1>
                    <img src="<?= $personnage->getImage(); ?>" alt="">

                    <span class="health bg-danger text-white p-3">
                        <?= $personnage->getPointsDeVie(); ?>
                    </span>
                    <span class="mana bg-dark text-white p-3 mx-2">
                        <?= $personnage->getPointsDeForce(); ?>
                    </span>
                    <span class="strength bg-primary text-white p-3">
                        <?= $personnage->getPointsDeMana(); ?>
                    </span>

                    <!-- Afficher l'inventaire sous forme de liste -->
                    <?= $personnage->afficheInventaire(); ?>

                    <span>Niveau : <?= $personnage->getNiveau(); ?></span>
                    <span>Expérience : <?= $personnage->getExperience(); ?></span><br>
                </div>
            <?php } ?>
        </div>
    </div>

    <style>
        body {
            background-image: url(https://www.dailymars.net/wp-content/uploads/2014/12/terre-du-milieu.jpg);
            color: white;
        }

        .health,
        .mana,
        .strength {
            position: absolute;
            height: 50px;
            width: 50px;
            border: 3px solid black;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
        }

        .health {
            top: 373px;
            left: 40px;
        }

        .mana {
            top: 426px;
            left: 30px;
        }

        .strength {
            top: 480px;
            left: 36px;
        }
    </style>

</body>

</html>