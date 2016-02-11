<?php
switch ($vd->getSottoPagina()) {
    case 'login':
		?><img title='ravioli' alt="Ravioli" src="../immagini/ravioli2.jpeg" width="230" height="300"><?
        break;
    case 'chiSiamo':
		?>
		<div class= "login1">
			<img title='login' alt="Login" src="../immagini/login.png" width="50" height="50">
			<p class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>">
			<a href="index.php?page=home&subpage=login"<?= $vd->scriviToken('?')?>">Login</a></p>
		</div>
		<img title='sebadas' alt="Sebadas" src="../immagini/sebadas5.jpeg" width="170" height="240">
		<?php 
		break;
	case 'prodotti':
		?>
		<div class= "login1">
			<img title='login' alt="Login" src="../immagini/login.png" width="50" height="50">
			<p class ="<?=$vd->getSottoPagina()=='login' ?'current_page_item' :'' ?>">
			<a href="index.php?page=home&subpage=login"<?= $vd->scriviToken('?')?>">Login</a></p>
		</div>
		<img title='sebadas' alt="Sebadas" src="../immagini/culur.jpeg" width="170" height="230">
		<?php 
		break;
	

}
?>
