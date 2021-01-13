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

    public function add (Driver $driver) {
        $query= $this->db->prepare('INSERT INTO driver (name, firstname) VALUES (:name, :firstname)');

        $query->bindValue(':name', $driver->getName());
        $query->bindValue(':firstname', $driver->getFirstname());
        return $query->execute();
    }

    public function delete ($id) {
        $query= $this->db->prepare('DELETE FROM driver WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

        return $query->fetch();
    }

    public function getDriverById ($id) {
        $query= $this->db->prepare('SELECT * FROM driver where id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

        $fetch = $query->fetch();
        $driver = new Driver($fetch['name'], $fetch['firstname']);
        $driver->setId($fetch['id']);

        return $driver;
    }

    public function update(Driver $driver) {

        $query= $this->db->prepare(
            'UPDATE driver SET name = :name, firstname = :firstname where id = :id');

        $query->bindValue(':name', $driver->getName());
        $query->bindValue(':firstname', $driver->getFirstname());
        $query->bindValue(':id', $driver->getId());

        return $query->execute();


    }

}