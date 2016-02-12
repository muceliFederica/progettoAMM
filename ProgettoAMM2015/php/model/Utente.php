<?php

include_once 'User.php';

class Utente extends User {

    public function __construct() {
        parent::__construct();
        $this->setRuolo(User::Utente);
    }
    

}

?>
