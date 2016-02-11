<?php
switch ($vd->getSottoPagina()) {
    case 'chiSiamo':
        include_once 'chiSiamo.php';
        break;
    case 'prodotti':
        include_once 'prodotti.php';
        break;
    case 'login':
	include_once 'login.php';
    	break;
    default:
?>
    <div class="home">
	<ul>
	    <li class="home1"><a href="#segnalibro">Contatti</a></li>
		<li class="home2"><a href="index.php?page=home&subpage=chiSiamo"<?= $vd->scriviToken('?')?>">Chi siamo</a></li>
		<li class="home3"><a href="index.php?page=home&subpage=prodotti<?= $vd->scriviToken('?')?>">Prodotti</a></li>
		<li class="home4"><a href="https://www.google.it/maps/place/Via+Municipio,+8,+08040+Cardedu+OG/@39.798116,9.624075,17z/data=!3m1!4b1!4m2!3m1!1s0x12de3c70f1049c03:0x30fb7426d760bc37" target="_blank"> Dove siamo </a></li>
	</ul>
		<img id="sebadas" title='sebadas' alt="sebadas" src="../immagini/seadas2.jpeg" width="350" height="220">
		<div class=right2>
		<img title='login' alt="Login" src="../immagini/login.png" width="60" height="60">
		<a  href="index.php?page=home&subpage=login">Login </a>
		</div>
	</div>
<?php
           break;  
}              


