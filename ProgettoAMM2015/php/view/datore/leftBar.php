<?php

switch ($vd->getSottoPagina()) {
	case '':
break;

default:
	?>
	<ul>
	    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=datore<?= $vd->scriviToken('?')?>">Home</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini da consegnare</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'gestioneProdotti' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=gestioneProdotti<?= $vd->scriviToken('?')?>">Gestione prodotti</a></li>
		<li class="<?= $vd->getSottoPagina() == 'riepilogoMensile' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=riepilogoMensile<?= $vd->scriviToken('?')?>">RiepilogoMensile</a></li>
	</ul>
	<?
break;
}
?>
