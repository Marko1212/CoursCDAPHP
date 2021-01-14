<?php


namespace Manager;


abstract class AbstractManager
{

    protected $db;

    public function __construct($host='localhost', $login='root', $password='', $database='vtc') {

        // on met le \ devant PDO  à cause du namespace
        $this->db = new \PDO("mysql:host=$host;dbname=$database", $login, $password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
        ]);

    }

    public function getList() {
        $query = $this->db->query('SELECT * FROM '.$this->table);
        $entities = [];

        // on encapsule les résultats de la requête dans des objets
        foreach($query ->fetchAll() as $entity) {
            $className = 'Entity\\'.ucfirst($this->table);
            $entityInstance = new $className();

            foreach($this->columns as $column) {
                $entityInstance->{'set'.ucfirst($column)}($entity[$column]);
            }
            //$entityInstance->setId($entity['id']);
            //$entityInstance->setName($entity['name']);
            //$entityInstance->setFirstname($entity['firstname']);

            $entities[] = $entityInstance;
        }

        return $entities;
    }

    public function add ($entity) {

        $sql = 'INSERT INTO '. $this->table . ' (';
        array_shift($this->columns);
        $sql .= implode(', ', $this->columns); // name, firstname
        $sql .= ') VALUES (';

        $values = [];
        foreach($this->columns as $column) {
            $values[]  =':'.$column;
        }

       /* $values = array_map(function ($column) {
            return ':'.$column;

        }, $this->columns); */

        $sql .= implode(', ', $values);

        $sql .=')';

      // var_dump($sql);

        $query= $this->db->prepare($sql);

        foreach($this->columns as $column) {
            $query->bindValue(':'.$column, $entity->{'get'.ucfirst($column)}());
        }
        return $query->execute();
    }

    public function delete ($id) {
        $query= $this->db->prepare('DELETE FROM '.$this->table. ' WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

    }

    public function getEntityById ($id) {
        $query= $this->db->prepare('SELECT * FROM '.$this->table.' WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

        $fetch = $query->fetch();

        $className = 'Entity\\'.ucfirst($this->table);
        $entity = new $className();

        foreach($this->columns as $column) {
            $entity -> {'set'.ucfirst($column)}($fetch[$column]);
        }

        return $entity;
    }

    public function update($entity) {
        $sql = 'UPDATE '.$this->table;

        array_shift($this->columns); // On supprime l'id
        $values = [];
        foreach ($this->columns as $column) {
            $values[] = $column.' = :'.$column;
        }

        $sql .= ' SET '.implode(', ', $values); // name = :name, firstname = :firstname
        $sql .= ' WHERE id = :id';

        $query = $this->db->prepare($sql);

        $query->bindValue(':id', $entity->getId()); // On n'a plus l'id dans $this->columns
        foreach ($this->columns as $column) {
            $query->bindValue(':'.$column, $entity->{'get'.ucfirst($column)}());
        }

        return $query->execute();
    }

}