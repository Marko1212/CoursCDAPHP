<?php

class Form {
   private $fields = [];

    
    /**
     * Permet de définir un champ dans mon formulaire
     */

    public function input($name) {
        $this->fields[] = $name;
        $label = ucfirst($name);

        return "<label for=\$name\">$label</label>
                <input type=\"text\" id=\"$name\"
                class=\"form-control\">";

    }

    public function button($name) {
        return "<button class=\"btn btn-primary\">$name</button>";
    }

}

