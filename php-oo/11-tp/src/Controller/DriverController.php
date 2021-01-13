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
        $validation -> name('firstname')->min(3)->required();
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

    public function edit() {
        // On doit récupérer le chauffeur qui est modifié dans la bdd

        $manager = new DriverManager();
        $driver = $manager->getDriverById($_GET['id']);

        $data = ['name' => $driver->getName(), 'firstname' => $driver->getFirstname()];

        // On crée le formulaire pour pouvoir l'afficher sur cette page
        $form = new \Form($data);

        if ($form->isSubmit()) {
            $form = new \Form($_POST);
        }


        $validation = new \Validation($form);
        $validation -> name('firstname')->min(3)->required();
        $validation -> name('name')->required();

        // On met à jour dans la BDD

        if ($form->isSubmit() && empty($validation->getErrors())) {
            $driver->setName($form->getData('name'));
            $driver->setFirstname($form->getData('firstname'));
            $manager->update($driver);
            header('Location: index.php?controller=driver&action=list');

        }

        include '../templates/driver/edit.html.php';
    }

    public function delete() {
        $manager = new DriverManager();
        $manager -> delete($_GET['id']);
        header('Location: index.php?controller=driver&action=list');
    }

}