<?php

namespace Controller;

use Entity\Driver;
use Manager\DriverManager;

class DriverController
{

    public function list() {
        $manager = new DriverManager();
        $drivers = $manager->getList();

        // On crée le formulaire pour pouvoir l'afficher sur cette page

        $form = new \Form($_POST);
        $validation = new \Validation($form);
        $validation -> name('firstname')->min(8)->required();
        $validation -> name('name')->required();

        // Ajouter le chauffeur en BDD

        if ($form->isSubmit() && empty($validation->getErrors())) {
            // On hydrate un objet Driver avec les données du formulaire
            // Hydrater veut simplement dire qu'on crée l'objet avec des données
            $driver = new Driver($form->getData('name'), $form->getData('firstname'));
            // On insère l'objet dans la BDD grâce au manager
            $manager->add($driver);
            header('Location: index.php?controller=driver&action=list');
        }

        // Le controller appelle la vue et donc l'affiche (html)

        include '../templates/driver/list.html.php';
    }

    public function create() {
        echo 'TOTO';
    }

}