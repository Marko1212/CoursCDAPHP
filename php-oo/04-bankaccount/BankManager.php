<?php 


class BankManager {
    private $db;

    public function __construct($host, $login, $password, $database) {
        $this->db = new PDO("mysql:host=$host;dbname=$database", $login, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
        ]);
    }


    public function add($bankAccount) {
        //$this->db nous donne l'objet PDO instancié
        $query = $this->db->prepare('INSERT INTO bankaccount (identifier, owner, balance, overdraft) VALUES (:identifier, :owner, :balance, :overdraft)');

        //On va lier les données de l'objet aux paramètres

        $query->bindValue(':identifier', $bankAccount->getNumber());
        $query->bindValue(':owner', $bankAccount->getOwner());
        $query->bindValue(':balance', $bankAccount->getBalance());
        $query->bindValue(':overdraft', $bankAccount->getOverdraft());

        // On retourne la requête et on retourne le résultat (true)
        return $query->execute();
    }

    public function getList() {
        $query = $this->db->query('SELECT * from bankaccount');

        $bankAccounts= [];

        //le résultat renvoyé par le SELECT est un tableau de tableaux
        //on le transforme ci-dessous en un tableau d'objets de classe BankAccount
        foreach($query->fetchAll() as $bankAccount) {

            // Attention ! les objets qu'on crée ci-dessous n'ont pas l'attribut $number qui est dans la BDD
            //en effet, l'attribut $number est créé à l'intérieur du constructeur ci-dessous, donc, il ne correspond
            //pas à celui de la BDD
            $bankAccounts[] = new BankAccount($bankAccount['owner'], $bankAccount['balance'], $bankAccount['overdraft']);

        }

        return $bankAccounts;
    }


}