<?php

switch ($vd->getSottoPagina()) {
	case '':
break;

default:
	?>
	<ul>
	    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=datore">Home</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=profilo">Dati personali</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=ordini">Ordini da consegnare</a></li>
	    <li class="<?= $vd->getSottoPagina() == 'gestioneProdotti' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=gestioneProdotti">Gestione prodotti</a></li>
		<li class="<?= $vd->getSottoPagina() == 'riepilogoMensile' ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=riepilogoMensile">RiepilogoMensile</a></li>
	</ul>
	<?
break;
}
?>
