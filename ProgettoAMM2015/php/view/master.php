<?php
include_once 'ViewDescriptor.php';
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <title><?= $vd->getTitolo() ?></title>
            <link rel="shortcut icon" type="image/x-icon" href="../immagini/logo.png">
            <meta name="description" content="Pagina gestione login dei due ruoli">
            <link href="../css/layout.css" rel="stylesheet" type="text/css" media="screen"> 
            <?php
            foreach ($vd->getScripts() as $script) {
                ?>
                <script type="text/javascript" src="<?= $script ?>"></script>
                <?php
            }
            ?>
        </head>
        <body id="body">
            <div id="pagina">
                <header>
                    <div class="social">
                        <ul>
                            <li id="facebook"><a href="https://www.facebook.com">facebook</a></li>
                            <li id="twitter"><a href="https://twitter.com/">twitter</a></li>
                        </ul>
			<select class="menu">
                            <?php
                            $Menu1 = $vd->getMenu();
                            require "$Menu1";
                            ?>
                        </select>
                    </div>
		<?if($vd->getSottoPagina()!=''){?>
                    <div id="header"> 
						<img id="logoI" title='logo' alt="Logo" src="../immagini/logo.png" width="330" height="248">
					 </div>
		
			<?}
		else{?>
		<div id="headerHome"> 
			<img id="logoIH" title='logo' alt="Logo" src="../immagini/logo.png" width="400" height="300">
		</div>
		<?}?>
						<div id="menu">
                            <?php
                            $menu = $vd->getMenu();
                            require "$menu";
                            ?>
                        </div>
                    </div>
                </header>
                <div id="sidebar1">
                    <ul>
                        <li id="categorie">
                            <?php
                           $left = $vd->getLeftBar();
                           require "$left";
                            ?>
                        </li>     
                    </ul>
                </div>
				<?if($vd->getSottoPagina()!=''){?>
                <div id="sidebar2">
                    <?php
                    $right = $vd->getRightBar();
                    require "$right";
                    ?>
                </div>
			<?	}?>
                <div id="content">
                    <?php
                    $content = $vd->getContent();
                    require "$content";
                    ?>
                </div>
                <a id ="segnalibro">
                <footer>
                    <div id="footer">
                        
                            <p>Pastificio Orru'</p>
                                <p class="contatti">
                                    Via Municipio 8,Cardedu (OG) tel.0782 75199 -f.m.s.orru@live.it
                                </p>
                    </div>
                </footer>
                </a>
            </div>
        </body>
    </html>
 




