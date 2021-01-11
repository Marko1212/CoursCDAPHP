<?php 


class Validation {
    private $fields = [
        'email' => ['required'],
        'telephone' => ['required'],
        'message' => ['min' => 15, 'required']
    ];

    public function name() {
        $this->fields[$field] = [];
    }

    

}