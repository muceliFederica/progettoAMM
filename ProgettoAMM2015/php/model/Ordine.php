<?php

include_once 'Prodotto.php';
include_once 'Utente.php';
include_once basename(__DIR__) . '/../model/UtenteFactory.php';
class Ordine {
    
    private $codice;
	private $position;
    private $prezzo;
    private $utente;
	public $contenuto;
	private $trovato;
	private $data;

	// un ordine e' caratterizzato da un array di prodotti e uno di quantita.
	//All'i-esima posizione corrisponde il prodotto e la quantita del prodotto acquistato
    public function __construct() {

		$this->contenuto=array();
		$this->quantita=array();
    }
	//Restituisce l'array contenuto
    public function getContenuto()
	{
		return $this->contenuto;
	}
    //aggiunge un prodotto con la relativa quantita' ad un ordine
	public function aggiungiProdotto($prodotto,$quantita) 
	{
			$position=count($this->contenuto);
			$trovato=0;
			for ($i=0;$i<count($this->contenuto);$i++)
			{
			//Verifico se il prodotto è presente nell'ordine
				if ($this->contenuto[$i]==$prodotto)
					 $trovato=1;
			}

			//Se il prodotto è già presente aggiorno quantità e variante
			if ($trovato==1)
			{ 
				$this->update($prodotto,$quantita);
			}
			else {
				//altrimenti aggiungo il prodotto all'ordine
				$this->contenuto[$position]=$prodotto;
				$this->quantita[$position]=$quantita;
			}
		
    }
	//aggiorno la quantita del prodotto nell'ordine
	public function update($contenuto,$quantita) {

		$position = -1;

		for ($i=0;$i<count($this->contenuto);$i++)
		{
		//Prelevo la posizione del prodotto nell'array
			if ($this->contenuto[$i]==$contenuto) 
			$position=$i;
		}

		//Aggiorno le informazioni del prodotto
		$this->quantita[$position]=$quantita;
		if ($position==-1) 
		echo "Impossibile aggiornare il prodotto,
			prodotto non trovato!<br><br>";

	}

	//restituisce la posizione del prodotto nell'array contenuto. Restituisce -1 se non e' presente
    private function posizione($prodotto1) 
	{
        for ($i = 0; $i < count($this->contenuto); $i++)
	 	{
            if ($this->contenuto[$i]->equals($prodotto1))
	 		{
                return $i;
            }
        }
        return -1;
    }

    /**
     * Restituisce il codice dell'ordine
     * @return type
     */
    public function getCodice() 
	{
        return $this->codice;
    }
    
    /**
     * Setta il codice dell'ordine
     * @param type $codice
     */
    public function setCodice($codice) 
	{
        $this->codice = $codice;
    }
	/**
     * Restituisce la data di consegna
     * @return type
     */

	public function getData() 
	{
        return $this->data;
    }
    
    /**
     * Setta la data di consegna
     * @param type $$data
     */
    public function setData($data) 
	{
        $this->data = $data;
    }
    
    /**
     * Restituisce il prezzo dell'ordine
     * @return type
     */
    public function getPrezzo() 
	{
        return $this->prezzo;
    }
    
    /**
     * Setta prezzo dell'ordine
     * @param type $prezzo
     */
    public function setPrezzo($prezzo) 
	{
        $this->prezzo = $prezzo;
    }

    /**
     * Setta l'utente che ha effettuato l'ordine
     * @param Utente $utente
     */
    public function setUtente($utente) 
	{
        $this->utente = $utente;
    }
	/**
     * Restituisce l'utente che ha effettuato l'ordine
     * @return type
     */
	
	public function getUtente() 
	{
        return $this->utente;
    }
    /**
     * Restituisce la quantita di un prodotto in un'ordine
     * @param $prodotto
     */
	public function getQuantita($prodotto) 
	{
		$position = -1;

		for ($i=0;$i<count($this->contenuto);$i++) 
		{
		//Prelevo la posizione del prodotto nell'array
			if ($this->contenuto[$i]==$contenuto) 
			$position=$i;
		}

		//Aggiorno le informazioni del prodotto
		$this->quantita[$position]=$quantita;
		if ($position==-1) 
		echo "Impossibile aggiornare il prodotto,
			prodotto non trovato!<br><br>";
	}
	//Stampo il contenuto dell'ordine
	public function StampaCarrello() {
		$somma=0;
		if (count($this->contenuto) > 0) 
		{ ?>

			<table>
				<tbody>
					<?
					?><tr >
							<th>Prodotto</th>
							<th>Quantità</th>
						</tr><?

						for ($i=0;$i<count($this->contenuto);$i++)
						{
							?>
							<tr>
								<td><?= $this->contenuto[$i]->getNome() ;?></br> 
								<td><?= $this->quantita[$i] ,' Kg';?></br> <?
								$somma=$somma+($this->contenuto[$i]->getPrezzo()*$this->quantita[$i]);?></br>    
							</tr>
							<?php
						}
						
					?>
				</tbody>
			</table>
			<p> Totale:<?=$somma,  ' Euro' ?></p>
			<form method="post" action="index.php?page=utente&subpage=home&somma=<?= $somma ?>">
						<input type="hidden" name="cmd" value="completaOrdine"/>
						<label for="date">Inserisci la data di consegna</label>
						<input type="date" name="date" value="2000-01-01"/>
						<button type="submit">Conferma ordine </button>
    			</form>

	<?php } 
	else 
		{ 
			?><p class="messaggio"> Nessun prodotto inserito </p><?
		} 
	}
}

?>

