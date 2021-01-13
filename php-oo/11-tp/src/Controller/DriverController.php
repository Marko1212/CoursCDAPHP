<?php

namespace Controller;

use Manager\DriverManager;

class DriverController
{

    public function list() {
        $manager = new DriverManager();
        $drivers = $manager->getList();

        // Le controlleur appelle la vue et donc l'affiche (html)

        include '../templates/driver/list.html.php';
    }

}