<?php

class Prodotto {
    
    private $nome;
    private $descrizione;
    private $prezzo;
    

    public function __construct() {
        
    }
    
    /**
     * Restituisce il giorno in cui si tiene l'edizione del corso
     * @return type
     */
    /*public function equals(Prodotto $prodotto)
	{
		if($this->getNome()==$prodotto->getNome())
			return true;
		else 
			return false;
	}*/
    public function getNome() {
        return $this->nome;
    }
    
    /**
     * Setta il giorno dell'edizione del corso
     * @param type $giorno
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    /**
     * Restituisce il numero dell'edizione
     * @return type
     */
    public function getDescrizione() {
        return $this->descrizione;
    }
    
    /**
     * Setta il numero dell'edizione
     * @param type $numero
     */
    public function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }
       
    /**
     * Restituisce il prezzo del'edizione del corso
     * @return type
     */
    public function getPrezzo() {
        return $this->prezzo;
    }
    
    /**
     * Setta il prezzo dell'edizione del corso
     * @param type $prezzo
     */
    public function setPrezzo($prezzo) {
        $this->prezzo = $prezzo;
    }

	
   
}

?>

