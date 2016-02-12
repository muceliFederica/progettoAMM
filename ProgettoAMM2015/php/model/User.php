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
     * Restituisce l'username dell'utente
     * @return type
     */
    public function getUser() {
        return $this->User;
    }
    
    /**
     * Setta l'username dell'utente
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
	/**
     * Restituisce l'id dell'utente
     * @return type
     */
	
	public function getId() {
        return $this->id;
    }
    
    /**
     * Restituisce l'email dell'utente
     * @return type
     */
	public function getEmail() {
        return $this->Email;
    }

   /**
    * Setta l'email dell'utente
    * @param type $temail
    */
    public function setEmail($email) {
        $this->Email = $email;           
    }
	
	/**
     * Restituisce cap dell'utente
     * @return type
     */
	 
	public function getCap() {
        return $this->Cap;
    }
	/**
    * Setta il cap dell'utente
    * @param type $cap
    */
	
	public function setCap($cap) {
        $this->Cap = $cap;           
    }
	/**
     * Restituisce la provincia dell'utente
     * @return type
     */
	 
	public function getProvincia() {
        return $this->Provincia;
    }
	/**
    * Setta la provincia dell'utente
    * @param type $provincia
    */
	
	
	public function setProvincia($provincia) {
        $this->Provincia = $provincia;           
    }
	/**
     * Restituisce la citta dell'utente
     * @return type
     */
	 
	 public function getCitta() {
        return $this->Citta;
    }
	/**
    * Setta la citta dell'utente
    * @param type $citta
    */
	
	public function setCitta($citta) {
        $this->Citta = $citta;           
    }
	/**
     * Restituisce la via dell'utente
     * @return type
     */
    public function getVia() {
        return $this->Via;
    }
	/**
    * Setta la via dell'utente
    * @param type $via
    */
	
	public function setVia($via) {
        $this->Via = $via;           
    }
	/**
     * Restituisce il numero civico dell'utente
     * @return type
     */
	
	public function getCivico() {
        return $this->Civico;
    }
	/**
    * Setta il numero civico dell'utente
    * @param type $civico
    */
	
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
     * Restituisce la password dell' utente
     * @return type
     */
    public function getPassword() {
        return $this->Password;
    }
    
    /**
     * Setta la password dell'utente
     * @param type $password
     * @return boolean
     */
    public function setPassword($password) {
        $this->Password = $password;
        return true;
    }
    
    /**
     * Restituisce il nome dell'utente
     * @return type
     */
    public function getNome() {
        return $this->Nome;
    }
    
    /**
     * Setta il nome dell'utente
     * @param type $nome
     * @return boolean
     */
    public function setNome($nome) {
        $this->Nome = $nome;
        return true;
    }
    
    /**
     * Restituisce il cognome dell'utente
     * @return type
     */
    public function getCognome() {
        return $this->Cognome;
    }
    
    /**
     * Setta il cognome dell'utente
     * @param type $cognome
     * @return boolean
     */
    public function setCognome($cognome) {
        $this->Cognome = $cognome;
        return true;
    }
    
    /**
     * Restituisce il ruolo utente
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
     /**
     * Setta il ruolo id dell'utente
     * @param type $id
     * @return $valore
     */

    
    
    public function setId($id){
        $valore = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!isset($valore)){
            return false;
        }
        $this->id = $valore;
    }
    
     /**
     * Controlla se utente esiste
     * @return type
     */
    public function esiste() {
        return isset($this->Ruolo);
    }

}

