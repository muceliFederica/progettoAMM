<?php

include_once 'Utente.php';
include_once 'Ordine.php';
include_once 'UtenteFactory.php';
include_once 'Prodotto.php';
include_once 'ProdottoFactory.php';

class OrdineFactory {

    private static $singleton;

    private function __constructor() {
        
    }

   
    public static function instance() {
        if (!isset(self::$singleton)) {

            self::$singleton = new OrdineFactory();
        }

        	return self::$singleton;
   	}

    
	public function crea($row) {
		
		$ordine = new Ordine();
		$ordine->setCodice($row['Cod']);
		$ordine->setUtente($row['Utente']);
		$ordine->setPrezzo($row['Prezzo']);
		$ordine->setData($row['Data']);
		return $ordine;
   	}
	public function getOrdiniFiltrati($mese,$anno)
	{
		$ordini = array();

		$query = "select Cod,Utente,Prezzo,Data from Ordini where Data like '$anno-$mese-%'";
	    
		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return $ordini;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return $ordini;
		}
		
		$ordini =  self::caricaOrdini($stmt);
		foreach($ordini as $ordine)
		{
			self::caricaContenuto($ordine);
		}
		$mysqli->close();
		return $ordini;

	}
	/*public function getOrdini()
	{
		$ordini = array();

		$query = "select Cod,Utente,Prezzo,Data from Ordini";
	    
		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return $ordini;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return $ordini;
		}
		
		$ordini =  self::caricaOrdini($stmt);
		foreach($ordini as $ordine)
		{
			self::caricaContenuto($ordine);
		}
		$mysqli->close();
		return $ordini;

	}*/
	
	public function getOrdiniUtente(Utente $user){
		$ordini = array();
		$id=$user->getId();
		$query = "select Cod,Utente,Prezzo,Data from Ordini where Utente= $id ";
	    
		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return $ordini;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return $ordini;
		}
		
		$ordini =  self::caricaOrdini($stmt);
		foreach($ordini as $ordine)
		{
			self::caricaContenuto($ordine);
		}
		$mysqli->close();
		return $ordini;
	}
	public function getOrdiniDaConsegnare()
	{
		$ordini = array();
		$query = "select Cod,Utente,Prezzo,Data from Ordini where Data>=(CURdate()) order by Data ";
	    
		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return $ordini;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return $ordini;
		}
		
		
		$ordini =  self::caricaOrdini($stmt);
		foreach($ordini as $ordine)
		{
			self::caricaContenuto($ordine);

		}
		$mysqli->close();
		return $ordini;
	}

	private function &caricaOrdini(mysqli_stmt $stmt){
		$ordini = array();
		 if (!$stmt->execute()) {
		    error_log("Impossibile eseguire lo statement");
		    return $null;
		}

		$row = array();
		$bind = $stmt->bind_result(
		        
		        $row['Cod'],
		        
		        $row['Utente'],

			$row['Prezzo'],
			$row['Data']
		      );
		
		if (!$bind) {
		    error_log("Impossibile effettuare il binding in output");
		    return null;
		}

		while ($stmt->fetch()) {
		    $ordini[] = self::crea($row);
		}
		
		$stmt->close();
		
		return $ordini;
    }


    public function caricaContenuto(Ordine $ordine)
    	{
		$id=$ordine->getCodice();
        $query = "select Nome, Prezzo,Descrizione,Quantita from
	 	ContenutoOrdine join Prodotti on Nome=Prodotto where Ordine= $id ";
    
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return null;
        }
        
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return null;
        }
		

	if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return null;
        }

	$row = array();
        $bind = $stmt->bind_result(
                $row['Nome'],
		$row['Prezzo'],
		$row['Descrizione'],
		$quantita
        );
        if (!$bind) {
            error_log("Impossibile effettuare il binding in output");
            return null;
        }

        while ($stmt->fetch()) {
            $ordine->aggiungiProdotto(ProdottoFactory::instance()->crea($row),$quantita);
        }
        $mysqli->close();
        $stmt->close();       
}


    /**
     * Ricerca di un corso con un dato codice
     * @param type $corsoCodice
     * @return array
     */
   /* public function cercaOrdinePerCodice($ordineCodice){
        $ordini = array();
        
        $query = "
               select Cod Cod_, Prezzo Prezzo_ ,Prodotto Prodotto_ ,Quantita Quantita_
                  from
                  Ordini 
                  JOIN ContenutoOrdine ON Ordine = Cod
              
               WHERE Ordini.Cod = ?";
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return $ordini;
        }
        
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return $ordini;
        }

        
        if (!$stmt->bind_param('i', $ordineCodice)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return $ordini;
        }

        $ordini=  self::caricaOrdini($stmt);
        
        
       
        
        if(count($ordini > 0)){
            $mysqli->close();
            return $ordini[0];
        }else{
            $mysqli->close();
            return null;
        }
    }

*/
	public function salva($ordine,$somma,$data)
	{
		$mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return 0;
        }
        $stmt=array();
        $stmt[0] = $mysqli->stmt_init();
		$utente= UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);
		$user=$utente->getId();
		$idOrdine= $this->cercaUltimoId()+1;
		$query=array();
		$query[0]="insert into Ordini (Cod,Utente,Prezzo,Data) values (?,?,?,?)";
		
		
		$stmt[0]->prepare($query[0]);
        if (!$stmt[0]) {
            error_log("Impossibile  inizializzare il prepared statement");
            return 0;
        }

		if (!$stmt[0]->bind_param('iids', $idOrdine,$user,$somma,$data)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return 0;
        }
        $mysqli->autocommit(false);
		
        if (!$stmt[0]->execute()) {
            error_log("Impossibile eseguire lo statement");
			$mysqli->rollback();
            return 0;
        }
		
		for ($i=1;$i<=count($ordine->contenuto);$i++)
		{
			
	
        
        	$stmt[$i] = $mysqli->stmt_init();
			$nome=$ordine->contenuto[$i-1]->getNome();
			$quantita=$ordine->quantita[$i-1];
			$query[$i]="insert into ContenutoOrdine (Ordine,Prodotto,Quantita) values (?,?,?)";
			$stmt[$i]->prepare($query[$i]);
		    if (!$stmt[$i]) {
				$mysqli->rollback();
		        error_log("Impossibile  inizializzare il prepared statement");
		        return 0;
		    }

			if (!$stmt[$i]->bind_param('isd', $idOrdine,$nome,$quantita)) {
			    error_log("Impossibile effettuare il binding in input");
				$mysqli->rollback();
			    $mysqli->close();
			    return 0;
			}
			if (!$stmt[$i]->execute()) {
				    error_log("Impossibile eseguire lo statement");
					print('ex');
					$mysqli->rollback();
				    return 0;
			}
			
    
		}
		
		$mysqli->commit();
        $mysqli->autocommit(true);
        $mysqli->close();
		
	}
    
    
    
    
    
    /**
     * Salvataggio dei cambiamenti agli attributi di un corso
     * @param Corso $corso
     * @return type
     */
    /*public function salva(Ordine $ordine){
         $query = "update Ordini set 
                    Utente = ?,
                    Prezzo = ?
                    where Codice = ?";
         
        return $this->modificaDB($ordine, $query);
        
    }
*/

	
    /**
     * Modifico il database in seguito ai cambiamenti sugli attributi di un corso
     * @param Corso $corso
     * @param type $query
     * @return int
     */
    /*private function modificaDB(Ordine $ordine, $query){
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            return 0;
        }

        $stmt = $mysqli->stmt_init();
       
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return 0;
        }

        if (!$stmt->bind_param('sssii', 
                $ordine->getPrezzo(),
                $ordine->getUtente(),
                
                $ordine->getCodice())) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return 0;
        }

        if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            $mysqli->close();
            return 0;
        }

        $mysqli->close();
        return $stmt->affected_rows;
    }*/
    
    /**
     * Aggiunge un utente e lo iscrive ad un corso
     * @param type $request
     * @param type $corsi
     * @return boolean
     */
  /*  public function aggiungi(&$request, &$corsi){
         
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return false;
        }
        
        $stmt = $mysqli->stmt_init();
        $stmt2 = $mysqli->stmt_init();
        
        // query di aggiunta di un utente
        $aggiungi_utente = "insert into Utenti (Password, Username, id, Cognome, Nome, Via, Civico, Citta, Provincia, Cap, Telefono, Email) values (?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
        
        // query di aggiunta di un iscrizione
        $aggiungi_prodotto = "insert into Prodotti (Nome, Prezzo, Descrizione) values (default, ?, ?, ?)";

	$aggiungi_ordine = "insert into Ordini (Codice, Prezzo, Utente) values (default, ?, ?, ?)";
        
        $stmt->prepare($aggiungi_utente);
        if (!$stmt) {
            error_log("Impossibile inizializzare il primo  prepared statement");
            $mysqli->close();
            return false;
        }


        $stmt2->prepare($aggiungi_prodotto);
        if (!$stmt2) {
            error_log("Impossibile inizializzare il secondo prepared statement");
            $mysqli->close();
            return false;
        }

	$stmt2->prepare($aggiungi_ordine);
        if (!$stmt2) {
            error_log("Impossibile inizializzare il secondo prepared statement");
            $mysqli->close();
            return false;
        }
        
        // cerco l'id sucessivo
        $id = $this->cercaUltimoId();
        $id++;
       
        $flag = 0;
        
        // controllo gli input del form di aggiunta e iscrizione di un utente
        
        if (isset($request['Password']) && $request['Password'] !== "") {
            $password = $request['Password'];
            $flag++;
        }
       
        if (isset($request['Username']) && $request['Username'] !== "") {
            $username = $request['Username'];
            $flag++;
        }
        
        if (isset($request['Cognome']) && $request['Cognome'] !== "") {
            $cognome = $request['Cognome'];
            $flag++;
        }
        
        if (isset($request['Nome']) && $request['Nome'] !== "") {
            $nome = $request['Nome'];
            $flag++;
        }
        
        if (isset($request['Email']) && $request['Email'] !== "") {
            $email = $request['Email'];
            $flag++;
        }
        
        if (isset($request['Telefono']) && $request['Telefono'] !== "") {
            $telefono = $request['Telefono'];
            $flag++;
        }
        
        if (isset($request['Via']) && $request['Via'] !== "") {
            $via = $request['Via'];
            $flag++;
        }
        
        if (isset($request['Civico']) && $request['Civico'] !== "") {
            $civico = $request['Civico'];
            $flag++;
        }
        
        if (isset($request['Citta']) && $request['Citta'] !== "") {
            $citta = $request['Citta'];
            $flag++;
        }
        
         if (isset($request['Provincia']) && $request['Provincia'] !== "") {
            $provincia = $request['Provincia'];
            $flag++;
        }
	 if (isset($request['Cap']) && $request['Cap'] !== "") {
            $cap = $request['Cap'];
            $flag++;
        }
       
        // se ci sono campi vuoti
        if($flag < 11) {
            $mysqli->close();
            echo '<p class="messaggio">Impossibile eseguire la richiesta. <br> E\' necessario compilare tutti i campi<p>';
            return false;
        }
        
        // tutti i campi sono stati compilati
        if (!$stmt->bind_param('ssisssss', $password, $username, $id, $cognome, $nome, $dataNascita, $telefono, $dataCertificato)) { 
            error_log("Impossibile effettuare il binding in input stmt1");
            $mysqli->close();
            return false;
        } 
        
        if (!$stmt2->bind_param('ssii', $dataIscrizione, $pagato, $numeroEdizione, $id)) {
            error_log("Impossibile effettuare il binding in input stmt1");
            $mysqli->close();
            return false;
        }
        
        // inizio la transazione
        $mysqli->autocommit(false);
        
        
        if (!$stmt->execute()) {
            error_log("Impossibile eseguire il primo statement");
            $mysqli->rollback();
            $mysqli->close();
            return false;
        }
        
        if (!$stmt2->execute()) {
            error_log("Impossibile eseguire il secondo statement");
            $mysqli->rollback();
            $mysqli->close();
            return false;
        }
        
        
        // ok
        $mysqli->commit();
        $mysqli->autocommit(true);
        $mysqli->close();

        return true;
    }*/

    private function cercaUltimoId(){
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return false;
        }
        
        $query = "select * from Ordini";
        $result = $mysqli->query($query);
        $mysqli->close();
        return $result->num_rows;
        
    }
         
    
}

?>
