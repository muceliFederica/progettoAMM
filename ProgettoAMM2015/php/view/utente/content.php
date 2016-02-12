<?php
switch ($vd->getSottoPagina()) {
    case 'profilo':
        include_once 'profilo.php';
        break;
		
    case 'ordini':
        include_once 'ordini.php';
        break;

    case 'nuovoOrdine':
        include_once 'nuovoOrdine.php';
        break;

	case 'credenziali':
        include_once 'credenziali.php';
        break;
	case 'riepilogo':
        include_once 'riepilogo.php';
        break;
    default:
        
    ?>
    <div class="home">
    <ul >
            <li class="home1"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
            <li class="home2"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
            <li class="home3"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li> 
	</ul>
	<img id="culurgionis" title='culurgionis' alt="culurgionis" src="../immagini/culurgionis2.jpeg" width="350" height="255">
	<div class=right2>
	<img title='login' alt="Login" src="../immagini/login.png" width="60" height="60">
	<a  href="index.php?page=utente&cmd=logout">Logout </a>
	</div>
	</div>
        <?php
        break;
}
?>


