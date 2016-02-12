<?php

include_once 'Database.php';
include_once 'User.php';
include_once 'Utente.php';
include_once 'Datore.php';

class UtenteFactory {
    
    private static $singleton;

    private function __constructor() {
        
    }
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new UtenteFactory();
        }

        return self::$singleton;
    }
	
	//Restituisce un utente dato l'id e il ruolo
    public function cercaUtentePerId($id, $ruolo) {
        
        $intval = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if (!isset($intval)) {
        
		return null;
        }
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        switch ($ruolo) {
            
            case User::Utente:
                $query = "select 
                    	Utenti.id Utenti_id, 
			Utenti.Nome Utenti_Nome,
			Utenti.Cognome Utenti_Cognome,
                    	Utenti.User Utenti_User, 
			Utenti.Password Utenti_Password,
			Utenti.Email Utenti_Email,
			Utenti.Via Utenti_Via,
			Utenti.Civico Utenti_Civico,
			Utenti.Citta Utenti_Citta,
			Utenti.Provincia Utenti_Provincia,
			Utenti.Cap Utenti_Cap,
			Utenti.Telefono Utenti_Telefono
                    
                    from Utenti
                    where Utenti.id = ?";
                
                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("Impossibile inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }

                if (!$stmt->bind_param('i', $intval)) {
                    error_log("Impossibile effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }
                
                return self::caricaUser($stmt);
            	break;
            
            case User::Datore:
                $query = "select 
                   	Datori.id Datori_id, 
			Datori.Nome Datori_Nome,
			Datori.Cognome Datori_Cognome,
                    	Datori.User Datori_User, 
			Datori.Password Datori_Password,
			Datori.Email Datori_Email,
			Datori.Via Datori_Via,
			Datori.Civico Datori_Civico,
			Datori.Citta Datori_Citta,
			Datori.Provincia Datori_Provincia,
			Datori.Cap Datori_Cap,
			Datori.Telefono Datori_Telefono
                    
                    from Datori
                    
                    where Datori.id = ?";

                $stmt = $mysqli->stmt_init();
                $stmt->prepare($query);
                if (!$stmt) {
                    error_log("Impossibile inizializzare il prepared statement");
                    $mysqli->close();
                    return null;
                }

                if (!$stmt->bind_param('i', $intval)) {
                    error_log("Impossibile effettuare il binding in input");
                    $mysqli->close();
                    return null;
                }

                $toRet =  self::caricaDatore($stmt);
                $mysqli->close();
                return $toRet;
		break;
            default: 
                return null;
        }
    }
    
 
    private function caricaDatore(mysqli_stmt $stmt) {

        if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                $row['Datori_id'],
                $row['Datori_Nome'],
                $row['Datori_Cognome'],
                $row['Datori_User'],
                $row['Datori_Password'],
		$row['Datori_Email'],
                $row['Datori_Via'],
                $row['Datori_Civico'],
		$row['Datori_Citta'],
                $row['Datori_Provincia'],
		$row['Datori_Cap'],
		$row['Datori_Telefono']
                );
        if (!$bind) {
            error_log("Impossibile effettuare il binding in output");
            return null;
        }

        if (!$stmt->fetch()) {
            return null;
        }

        $stmt->close();

        return self::creaDatore($row);
    }

    private function caricaUser(mysqli_stmt $stmt) {

        if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                $row['Utenti_id'],
                $row['Utenti_Nome'],
                $row['Utenti_Cognome'],              
                $row['Utenti_User'],
                $row['Utenti_Password'],
		$row['Utenti_Email'],
		$row['Utenti_Via'],
                $row['Utenti_Civico'],
		$row['Utenti_Citta'],
		$row['Utenti_Provincia'],
                $row['Utenti_Cap'],
		$row['Utenti_Telefono']		

                 );
        if (!$bind) {
            error_log("Impossibile effettuare il binding in output");
            return null;
        }

        if (!$stmt->fetch()) {
            return null;
        }

        $stmt->close();

        return self::creaUtente($row);
    }
    

    public function caricaUtente($username, $password) {


        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }

        $query = "select 
                    	Utenti.id Utenti_id, 
			Utenti.Nome Utenti_Nome,
			Utenti.Cognome Utenti_Cognome,
                    	Utenti.User Utenti_User, 
			Utenti.Password Utenti_Password,
			Utenti.Email Utenti_Email,
			Utenti.Via Utenti_Via,
			Utenti.Civico Utenti_Civico,
			Utenti.Citta Utenti_Citta,
			Utenti.Provincia Utenti_Provincia,
			Utenti.Cap Utenti_Cap,
                    	Utenti.Telefono Utenti_Telefono
                    
                    from Utenti
                where Utenti.User = ? and Utenti.Password = ?";
        
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $utente = self::caricaUser($stmt);
        if (isset($utente)) {
            $mysqli->close();
            return $utente;
        }
        
        $query = "select 
                   	Datori.id Datori_id, 
			Datori.Nome Datori_Nome,
			Datori.Cognome Datori_Cognome,
                    	Datori.User Datori_User, 
			Datori.Password Datori_Password,
			Datori.Email Datori_Email,
			Datori.Via Datori_Via,
			Datori.Civico Datori_Civico,
			Datori.Citta Datori_Citta,
			Datori.Provincia Datori_Provincia,
			Datori.Cap Datori_Cap,
                    	Datori.Telefono Datori_Telefono
                    
                    from Datori
                where Datori.User = ? and Datori.Password = ?";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }

        if (!$stmt->bind_param('ss', $username, $password)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return null;
        }

        $datore = self::caricaDatore($stmt);
        if (isset($datore)) {
            $mysqli->close();
            return $datore;
        }
    }
    //crea l'utente
    public function creaUtente($row) {
         
        $utente = new Utente();
        $utente->setId($row['Utenti_id']);
        $utente->setNome($row['Utenti_Nome']);
        $utente->setCognome($row['Utenti_Cognome']);
		$utente->setUser($row['Utenti_User']);
        $utente->setPassword($row['Utenti_Password']);
        $utente->setEmail($row['Utenti_Email']);
        $utente->setVia($row['Utenti_Via']);
        $utente->setCivico($row['Utenti_Civico']);
		$utente->setCitta($row['Utenti_Citta']);
		$utente->setProvincia($row['Utenti_Provincia']);
		$utente->setCap($row['Utenti_Cap']);
		$utente->setTelefono($row['Utenti_Telefono']);
        $utente->setRuolo(User::Utente);

        
        return $utente;
    }
    //crea il datore
    public function creaDatore($row) {
        
        $datore = new Datore();
        $datore->setId($row['Datori_id']);
        $datore->setNome($row['Datori_Nome']);
        $datore->setCognome($row['Datori_Cognome']);
        $datore->setUser($row['Datori_User']);
        $datore->setPassword($row['Datori_Password']);
        $datore->setEmail($row['Datori_Email']);
        $datore->setVia($row['Datori_Via']);
        $datore->setCivico($row['Datori_Civico']);
		$datore->setCitta($row['Datori_Citta']);
		$datore->setProvincia($row['Datori_Provincia']);
		$datore->setCap($row['Datori_Cap']);
		$datore->setTelefono($row['Datori_Telefono']);
        $datore->setRuolo(User::Datore);

        
        return $datore;
    }
	//Salva un'utente controllando che sia un utente o un datore
    public function salva(User $user) {
        
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return 0;
        }
        
        $stmt = $mysqli->stmt_init();
        $count = 0;
        switch ($user->getRuolo()) {
            case User::Utente:
               
                $count = $this->salvaUtente($user, $stmt);
                break;
            case User::Datore:
                
                $count = $this->salvaDatore($user, $stmt);
        }
		return $count;
        $stmt->close();
        $mysqli->close();
    }

    private function salvaUtente(Utente $utente, mysqli_stmt $stmt) {

		   $query = " update Utenti set 
						        
						Nome=?,
						Cognome=?,
			        	User=?, 
						Password =?,
						Email =?,
						Via =?,
						Civico =?,
						Citta =?,
						Provincia =?,
						Cap=?,
			        	Telefono=?
		                where Utenti.id = ? ";
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            return 0;
        }

       if (!$stmt->bind_param('ssssssissiii',
			$utente->getNome(),
			$utente->getCognome(),
			$utente->getUser(), 
			$utente->getPassword(), 
			$utente->getEmail(),
			$utente->getVia(),
			$utente->getCivico(),
			$utente->getCitta(),
			$utente->getProvincia(),
			$utente->getCap(),
			$utente->getTelefono(),
			$utente->getId()
			))  
	{
            error_log("Impossibile effettuare il binding in input");
            return 0;
        }

        if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return 0;
        }

        return 1;
    }
    
    
    
   
    private function salvaDatore(Datore $utente, mysqli_stmt $stmt) {
        $query = " update Datori set 
                    
						Nome=?,
						Cognome=?,
                    	User=?, 
						Password =?,
						Email =?,
						Via =?,
						Civico =?,
						Citta =?,
						Provincia =?,
						Cap=?,
                    	Telefono=?
                    where Datori.id = ?
                    ";
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            return 0;
        }

       if (!$stmt->bind_param('ssssssissiii',
	$utente->getNome(),
	$utente->getCognome(),
	$utente->getUser(), 
	$utente->getPassword(), 
	$utente->getEmail(),
	$utente->getVia(),
	$utente->getCivico(),
	$utente->getCitta(),
	$utente->getProvincia(),
	$utente->getCap(),
	$utente->getTelefono(),
	$utente->getId()
	))  
	{
            error_log("Impossibile effettuare il binding in input");
            return 0;
        }

        if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return 0;
        }

        return 1;
    }
    
}
?>
