<?php

class User {

const Utente=1;
const Datore=2;
    
    private $username;
	
	private $id;
	
	private $email;
	
	private $via;
	
	private $civico;
	
	private $citta;
	
	private $provincia;
    
	private $cap;
	
	private $telefono;
	
    private $password;
    
    private $nome;

    private $cognome;
 
    private $ruolo;
    



    public function __construct() {
        
    }

    /**
     * Restituisce l'username dell'utente/istruttore
     * @return type
     */
    public function getUser() {
        return $this->User;
    }
    
    /**
     * Setta l'username dell'utente/istruttore
     * @param type $username
     * @return boolean
     */
    public function setUser($username) {
        if (!filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/[a-zA-Z]/')))) {
            return false;
        }
        $this->User = $username;
        return true;
    }
	
	public function getId() {
        return $this->id;
    }
    
    /**
     * Setta l'username dell'utente/istruttore
     * @param type $username
     * @return boolean
     */
  
	
	public function getEmail() {
        return $this->Email;
    }

   /**
    * Setta il numero di telefono del'utente
    * @param type $telefono
    */
    public function setEmail($email) {
        $this->Email = $email;           
    }
	
	/**
     * Restituisce il numero di telefono dell'utente
     * @return type
     */
	 
	public function getCap() {
        return $this->Cap;
    }
	
	public function setCap($cap) {
        $this->Cap = $cap;           
    }
	 
	public function getProvincia() {
        return $this->Provincia;
    }
	
	public function setProvincia($provincia) {
        $this->Provincia = $provincia;           
    }
	 
	 public function getCitta() {
        return $this->Citta;
    }
	
	public function setCitta($citta) {
        $this->Citta = $citta;           
    }
	
    public function getVia() {
        return $this->Via;
    }
	
	public function setVia($via) {
        $this->Via = $via;           
    }
	
	public function getCivico() {
        return $this->Civico;
    }
	
	public function setCivico($civico) {
        $this->Civico = $civico;           
    }
	/**
     * Restituisce il numero di telefono dell'utente
     * @return type
     */
    public function getTelefono() {
        return $this->Telefono;
    }
   /**
    * Setta il numero di telefono del'utente
    * @param type $telefono
    */
    public function setTelefono($telefono) {
        $this->Telefono = $telefono;           
    }
    
    /**
     * Restituisce la password dell' utente/istruttore
     * @return type
     */
    public function getPassword() {
        return $this->Password;
    }
    
    /**
     * Setta la password dell'utente/istruttore
     * @param type $password
     * @return boolean
     */
    public function setPassword($password) {
        $this->Password = $password;
        return true;
    }
    
    /**
     * Restituisce il nome dell'utente/istruttore
     * @return type
     */
    public function getNome() {
        return $this->Nome;
    }
    
    /**
     * Setta il nome dell'utente/istruttore
     * @param type $nome
     * @return boolean
     */
    public function setNome($nome) {
        $this->Nome = $nome;
        return true;
    }
    
    /**
     * Restituisce il cognome dell'utente/istruttore
     * @return type
     */
    public function getCognome() {
        return $this->Cognome;
    }
    
    /**
     * Setta il cognome dell'utente/istruttore
     * @param type $cognome
     * @return boolean
     */
    public function setCognome($cognome) {
        $this->Cognome = $cognome;
        return true;
    }
    
    /**
     * Restituisce il ruolo "utente" o "istruttore"
     * @return type
     */
    public function getRuolo() {
        return $this->Ruolo;
    }
    
    /**
     * Setta il ruolo "utente" o "datore"
     * @param type $ruolo
     * @return boolean
     */
    public function setRuolo($ruolo) {
        switch ($ruolo) {
            case self::Datore:
            case self::Utente:
                $this->Ruolo = $ruolo;
                return true;
            default:
                return false;
        }
    }
    

    
    
    public function setId($id){
        $valore = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($valore)){
            return false;
        }
        $this->id = $valore;
    }
    
     /**
     * Controlla se utente/istruttore esiste
     * @return type
     */
    public function esiste() {
        return isset($this->Ruolo);
    }
    
    /*public function equals(User $user) {

        return  $this->id == $user->id &&
                $this->Nome == $user->Nome &&
                $this->Cognome == $user->Cognome &&
                $this->Ruolo == $user->Ruolo;
    }*/

}

