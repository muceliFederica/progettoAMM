<?php
switch ($vd->getSottoPagina()) {
    case 'profilo':
        include_once 'profilo.php';
        break;
		
    case 'ordini':
        include_once 'ordini.php';
        break;

    case 'gestioneProdotti':
        include_once 'gestioneProdotti.php';
        break;
		
	case 'inserisciProdotto':
        include_once 'inserisciProdotto.php';
        break;
	
	case 'modificaProdotto':
        include_once 'modificaProdotto.php';
        break;

	case 'eliminaProdotto':
        include_once 'eliminaProdotto.php';
        break;

	case 'credenziali':
        include_once 'credenziali.php';
        break;
		
	case 'riepilogoMensile':
        include_once 'riepilogoMensile.php';
        break;
		
	case 'ordiniPerMese':
	include_once 'ordiniPerMese.php';
        break;
		
	case 'riassuntoMensile':
        include_once 'riassuntoMensile.php';
        break;
    default:
       ?>
       <div class="home">
		    <ul >
		        <li class="home1"><a href="index.php?page=datore&subpage=profilo">Dati personali</a></li>
		        <li class="home2"><a href="index.php?page=datore&subpage=ordini">Ordini da consegnare</a></li>
				<li class="home3"><a href="index.php?page=datore&subpage=gestioneProdotti">Gestione prodotti</a></li>
				<li class="home4"><a href="index.php?page=datore&subpage=riepilogoMensile">RiepilogoMensile</a></li>
		    </ul>
			<img id="ravioli" title='ravioli' alt="ravioli" src="../immagini/ravioli.jpeg" width="320" height="213">
			<div class=right2>
				<img title='login' alt="Login" src="../immagini/login.png" width="60" height="60">
				<a href="index.php?page=utente&cmd=logout"> Logout </a>
			</div>
		</div>
        <?php
        break;
}
?>


