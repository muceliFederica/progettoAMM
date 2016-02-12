<ul>
    <li class="logout"> <a href="index.php?page=datore&cmd=logout">  Logout </a> </li> 
    <li class="<?= strpos($vd->getSottoPagina(),'home') !== false || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=datore">Home</a></li>
    <li class="<?= strpos($vd->getSottoPagina(), 'ordini') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=ordini">Ordini da consegnare</a></li>
    <li class="<?= strpos($vd->getSottoPagina(),'gestioneProdotti') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=gestioneProdotti">Gestione prodotti</a></li>
	<li class="<?= strpos($vd->getSottoPagina(),'aggiungi_utente') !== false ? 'current_page_item' : '' ?>"><a href="index.php?page=datore&subpage=riepilogoMensile">Riepilogo mensile</a></li>
</ul>
