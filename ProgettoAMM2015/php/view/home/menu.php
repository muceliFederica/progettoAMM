
<ul>
    <li class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>"> <a href="index.php?page=home&subpage=login"
	<?= $vd->scriviToken('?')?>">  Login </a> </li> 
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=home<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
</ul>


