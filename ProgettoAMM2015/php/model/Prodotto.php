<?php

class Prodotto {
    
    private $nome;
    private $descrizione;
    private $prezzo;
    

    public function __construct() {
        
    }
    /**
     * Restituisce il nome del prodotto
     * @return type
     */
    
    public function getNome() {
        return $this->nome;
    }
    
    /**
     * Setta il nome del prodotto
     * @param type $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    /**
     * Restituisce la descrizione del prodotto
     * @return type
     */
    public function getDescrizione() {
        return $this->descrizione;
    }
    
    /**
     * Setta la descrizione del prodotto
     * @param type $descrizione
     */
    public function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }
       
    /**
     * Restituisce il prezzo del prodotto
     * @return type
     */
    public function getPrezzo() {
        return $this->prezzo;
    }
    
    /**
     * Setta il prezzo del prezzo
     * @param type $prezzo
     */
    public function setPrezzo($prezzo) {
        $this->prezzo = $prezzo;
    }
  
}

?>

