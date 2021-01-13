<?php


namespace Manager;


use Entity\Driver;

class DriverManager
{

    private $db;

    public function __construct($host='localhost', $login='root', $password='', $database='vtc') {

        // on met le \ devant PDO  à cause du namespace
        $this->db = new \PDO("mysql:host=$host;dbname=$database", $login, $password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
        ]);

    }

    public function getList() {
        $query = $this->db->query('SELECT * FROM driver');
        $drivers = [];

        foreach($query ->fetchAll() as $driver) {
            $driverInstance = new Driver($driver['name'], $driver['firstname']);
            $driverInstance->setId($driver['id']);
            $drivers[] = $driverInstance;
        }

        return $drivers;
    }


}