<?php

spl_autoload_register(function($class) {
    // Pour linux et mac, on remplace \ par /
    // Controller\DriverController devient Controller/DriverController
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    //On va chercher les classes au bon endroit
    // ../src/Controller/DriverController.php
    require_once'../src/' .$class. '.php';
    // sur windows les deux fonctionnent: '\' et '/', parce que php
    // convertit les '/' en '\' sur windows
});

$controller= $_GET['controller'] ?? 'driver';
$action = $_GET['action'] ?? 'list';

// On va aiguiller vers la bonne page
// Accès à la page index.php?controller=driver&action=list
// La notation php utilise des '\' (cf. ci-dessous)

    $controllerClassName = 'Controller\\'.ucfirst($controller).'Controller';
    $driverController = new $controllerClassName();


   /* if ($action === 'list') {
        $driverController->list();
    } else if ($action === 'create') {
        $driverController->create();
    } */

    $driverController->$action();

