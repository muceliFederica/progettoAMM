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
	//crea l'ordine
	public function crea($row) {
		
		$ordine = new Ordine();
		$ordine->setCodice($row['Cod']);
		$ordine->setUtente($row['Utente']);
		$ordine->setPrezzo($row['Prezzo']);
		$ordine->setData($row['Data']);
		return $ordine;
   	}
	//Restituisce gli ordini filtrati secondo il mese e l'anno selezionati
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
	//Restituisce gli ordini di un utente
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
	//Restituisce gli ordini da consegnare, ossia gli ordini in cui la data di consegna e' successiva alla data attuale
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
	//Salva un ordine nel database
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
		//Inizio transazione
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
		//Fine transazione
        $mysqli->autocommit(true);
        $mysqli->close();
		
	}
    //Restituisce l'ultimo Id utilizzato
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
