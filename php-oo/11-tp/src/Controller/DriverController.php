<?php

namespace Controller;

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
            var_dump($form->getData());
        }

        // Le controller appelle la vue et donc l'affiche (html)

        include '../templates/driver/list.html.php';
    }

    public function create() {
        echo 'TOTO';
    }

}