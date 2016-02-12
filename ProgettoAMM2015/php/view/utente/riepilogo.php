<?php
include_once basename(__DIR__) . '/../model/Ordine.php';

	if(!isset($_SESSION['newOrdine']))
	{
		?><p class="messaggio">Nessun prodotto inserito</p><?
	}else
	{
		?><div class="content2"><?
		$_SESSION['newOrdine']->StampaCarrello();
		?><form method="post" action="index.php?page=utente&subpage=nuovoOrdine&cmd=modificaOrdine<?= $vd->scriviToken('?')?>">
			<button type="submit"">Modifica ordine</button>
		</form>
		</div><?
	
	}
	
?>
