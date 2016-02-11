<?php
include_once 'Prodotto.php';

class ProdottoFactory {
    
    private static $singleton;

    private function __constructor() {
        
    }

   
    public static function instance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new ProdottoFactory();
        }

        return self::$singleton;
    }

    
    public function crea($row) {
        
        $prodotto = new Prodotto();
        $prodotto->setNome($row['Nome']);
        $prodotto->setPrezzo($row['Prezzo']);
        $prodotto->setDescrizione($row['Descrizione']);
        return $prodotto;
    }
	
public function getProdotti(){
	$prodotti = array();
        $query = "select nome,prezzo,descrizione from Prodotti";
        
        $mysqli = Database::getInstance()->connectDb();
        if (!isset($mysqli)) {
            error_log("Impossibile inizializzare il database");
            $mysqli->close();
            return $prodotti;
        }
        
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($query);
        if (!$stmt) {
            error_log("Impossibile inizializzare il prepared statement");
            $mysqli->close();
            return $prodotti;
        }
        $prodotti =  self::caricaProdotti($stmt);
        $stmt->close();
		$mysqli->close();
        return $prodotti;
	}
	public function getProdottoPerNome($nome){
		
		$prodotti=ProdottoFactory::instance()->getProdotti();
		foreach($prodotti as $prodotto)
		{
			
			if($prodotto->getNome() == $nome) return $prodotto ;
		}
		return $null;
		
	}
	private function &caricaProdotti(mysqli_stmt $stmt){
       	
         if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return $null;
        }

        $row = array();
        $bind = $stmt->bind_result(
                
                $row['Nome'],
                $row['Prezzo'],
		$row['Descrizione']
              );
        
        if (!$bind) {
            error_log("Impossibile effettuare il binding in output");
            return null;
        }

        while ($stmt->fetch()) {
            $prodotti[] = self::crea($row);
        }
        return $prodotti;
    }

	public function salvaModifiche($prodotto)
	{
		$query="Update Prodotti set Prezzo=?,Descrizione=? where Nome=?";

		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return 0;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return 0;
		}
		if (!$stmt->bind_param('dss',$prodotto->getPrezzo(),$prodotto->getDescrizione(),$prodotto->getNome())) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return 0;
        }
		if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return 0;
        }
		$stmt->close();
		$mysqli->close();
		return 0;
	}

	public function inserisciProdotto($nome,$prezzo,$descrizione)
	{
		$query="Insert into Prodotti (Nome,Prezzo,Descrizione) values (?,?,?)";

		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return 0;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return 0;
		}
		if (!$stmt->bind_param('sds',$nome,$prezzo,$descrizione)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return 0;
        }
		if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return 0;
        }
		$stmt->close();
		$mysqli->close();
		return 0;
	}

	public function elimina($nome)
	{
		$query="Delete from Prodotti where Nome=?";

		$mysqli = Database::getInstance()->connectDb();
		if (!isset($mysqli)) {
		    error_log("Impossibile inizializzare il database");
		    $mysqli->close();
		    return 0;
		}
		
		$stmt = $mysqli->stmt_init();
		$stmt->prepare($query);
		if (!$stmt) {
		    error_log("Impossibile inizializzare il prepared statement");
		    $mysqli->close();
		    return 0;
		}
		if (!$stmt->bind_param('s',$nome)) {
            error_log("Impossibile effettuare il binding in input");
            $mysqli->close();
            return 0;
        }
		if (!$stmt->execute()) {
            error_log("Impossibile eseguire lo statement");
            return 0;
        }
		
		$mysqli->close();
		$stmt->close();
			
	}

}
?>



