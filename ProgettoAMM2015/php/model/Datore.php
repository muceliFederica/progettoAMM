<?php

include_once 'User.php';

class Datore extends User {

    
    public function __construct() {
        parent::__construct();
        $this->setRuolo(User::Datore);
    }

}

?>
