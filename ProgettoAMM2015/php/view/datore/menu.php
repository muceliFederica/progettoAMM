<ul>
    <li class="logout"> <a href="index.php?page=datore&cmd=logout">  Logout </a> </li> 
    <li class="<?= strpos($vd->getSottoPagina(),'home') !== false || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=datore&subpage=home<?= $vd->scriviToken('?')?>">Home</a></li>
    <li class="<?= strpos($vd->getSottoPagina(), 'ordini') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini da consegnare</a></li>
    <li class="<?= strpos($vd->getSottoPagina(),'gestioneProdotti') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=gestioneProdotti<?= $vd->scriviToken('?')?>">Gestione prodotti</a></li>
	<li class="<?= strpos($vd->getSottoPagina(),'aggiungi_utente') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=riepilogoMensile<?= $vd->scriviToken('?')?>">Riepilogo mensile</a></li>
</ul>
