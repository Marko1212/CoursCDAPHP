<?php

class Form {
   private $fields = [];
   
   /**
    * Contient toutes les données du formulaire
    */
   private $data = [];

   //par défaut (si on ne passe pas d'argument au constructeur), l'argument passé au constructeur est un tableau vide
   public function __construct($data = []) {
       $this->data = $data;
   }
    
    /**
     * Permet de définir un champ dans mon formulaire
     */

    public function input($name, $type = 'text') {
        $this->fields[] = $name;
        $label = ucfirst($name);


        $value = $this->getData($name);

        return "<label for=\"$name\">$label</label>
                <input type=\"$type\" name=\"$name\" id=\"$name\"
                class=\"form-control\" value=\"$value\">";

    }

    public function select($name, $values) {
        $this->fields[] = $name;
        $label = ucfirst($name);

        $value = $this->getData($name);

        //on génère les options du select

        $options = '';

        foreach($values as $value) {
            $options .= "<option value=\"$value\">$value</option>";
        }



        return "<label for=\"$name\">$label</label>
                <select name=\"$name\" id=\"$name\"
                class=\"form-control\">
                $options
                </select>";

    }

    public function textarea($name) {
        $this->fields[] = $name;
        $label = ucfirst($name);

        $value = $this->getData($name);

        return "<label for=\"$name\">$label</label>
                <textarea name=\"$name\" id=\"$name\"
                class=\"form-control\">$value</textarea>";

    }

    public function button($name) {
        return "<button class=\"btn btn-primary\">$name</button>";
    }


    /**
     * Permet de vérifier si le formulaire est soumis ou non
     */
    public function isSubmit() {
        return !empty($_POST);

    }

    public function getData($key = null) {

        if ($key !== null) {
            return $this->data[$key] ?? null;
        }
        return $this->data;
    }

    public function getErrors($errors) {
        if (strlen($this->getData('message')) < 15) {

        }

    }
}

