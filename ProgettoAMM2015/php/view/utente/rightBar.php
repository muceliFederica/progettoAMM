<?php

switch ($vd->getSottoPagina()) {

	case 'nuovoOrdine':
	?><p><br><br><br></p>
	<img title='culurgionis' alt="Culurgionis" src="../immagini/culurgionis3.jpeg" width="250" height="150"><?
	break;
	case 'riepilogo':
	break;
	case 'profilo':
	?>
	<div class= "login1">
		<img title='ordine' alt="ordine" src="../immagini/carrello.png" width="50" height="50">
		<p class ="<?=$vd->getSottoPagina()=='ordina' ?'current_page_item' :'' ?>">
		<a href="index.php?page=utente&subpage=nuovoOrdine"<?= $vd->scriviToken('?')?>">Ordina</a><br><br><br></p>
	</div>
	<img title='culurgionis' alt="Culurgionis" src="../immagini/arrosto.jpeg" width="200" height="240">
	<?
	break;
	case 'ordini':
	?>
	<div class= "login1">
		<img title='ordine' alt="ordine" src="../immagini/carrello.png" width="50" height="50">
		<p class ="<?=$vd->getSottoPagina()=='ordina' ?'current_page_item' :'' ?>">
		<a href="index.php?page=utente&subpage=nuovoOrdine"<?= $vd->scriviToken('?')?>">Ordina</a><br>
	<br><br><br></p>
	
	</div>
	<img title='culurgionis' alt="Culurgionis" src="../immagini/culurgionis1.jpeg" width="220" height="170">
	<?
	break;
	default:
	break;
}
                
            
