<ul>
    <li class="logout"> <a href="index.php?page=utente&cmd=logout">  Logout </a> </li> 
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=home">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
</ul>
