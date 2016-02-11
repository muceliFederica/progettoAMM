<?php
switch ($vd->getSottoPagina()) {

	
	case 'profilo':
	?>
	
		<div class= "login1">
			<img title='logout' alt="Logout" src="../immagini/login.png" width="50" height="50">
			<p class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>">
			<a href="index.php?page=utente&cmd=logout"<?= $vd->scriviToken('?')?>">Logout</a><br><br><br></p>
		</div>
	<img title='coccoi' alt="Coccoi" src="../immagini/coccoi1.jpeg" width="220" height="220">
	<?
	break;
	case 'credenziali':
	?>
	<div class= "login1">
			<img title='logout' alt="Logout" src="../immagini/login.png" width="50" height="50">
			<p class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>">
			<a href="index.php?page=utente&cmd=logout"<?= $vd->scriviToken('?')?>">Logout</a><br><br><br></p>
		</div>
	<img title='sebadas' alt="Sebadas" src="../immagini/sebadas1.jpeg" width="220" height="220">
	<?
	break;
	case 'riepilogoMensile':
	?>
	<div class= "login1">
			<img title='logout' alt="Logout" src="../immagini/login.png" width="50" height="50">
			<p class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>">
			<a href="index.php?page=utente&cmd=logout"<?= $vd->scriviToken('?')?>">Logout</a><br><br><br></p>
		</div>
	<img title='ravioli' alt="Ravioli" src="../immagini/ravioli3.jpeg" width="220" height="220">
	<?
	break;
	
}
