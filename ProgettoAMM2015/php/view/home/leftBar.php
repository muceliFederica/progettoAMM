<div class="leftbar">
<?php

switch ($vd->getSottoPagina()) {

    case 'chiSiamo':?>
<ul>
        <li><a href="#segnalibro">Contatti</a></li>
	<li class ="<?=$vd->getSottoPagina()=='chiSiamo' ?'current_page_item' :'' ?>"><a href="index.php?page=home&subpage=chiSiamo">Chi siamo</a></li>
	<li class="<?= $vd->getSottoPagina() == 'prodotti' ? 'current_page_item' : '' ?>"><a href="index.php?page=home&subpage=prodotti">Prodotti</a></li>
	<li><a href="https://www.google.it/maps/place/Via+Municipio,+8,+08040+Cardedu+OG/@39.798116,9.624075,17z/data=!3m1!4b1!4m2!3m1!1s0x12de3c70f1049c03:0x30fb7426d760bc37" target="_blank"> Dove siamo </a></li>
</ul><?php

        break;

    case 'prodotti':?>
<ul>
        <li><a href="#segnalibro">Contatti</a></li>
	<li class ="<?=$vd->getSottoPagina()=='chiSiamo' ?'current_page_item' :'' ?>"><a href="index.php?page=home&subpage=chiSiamo">Chi siamo</a></li>
	<li class="<?= $vd->getSottoPagina() == 'prodotti' ? 'current_page_item' : '' ?>"><a href="index.php?page=home&subpage=prodotti">Prodotti</a></li>
	<li><a href="https://www.google.it/maps/place/Via+Municipio,+8,+08040+Cardedu+OG/@39.798116,9.624075,17z/data=!3m1!4b1!4m2!3m1!1s0x12de3c70f1049c03:0x30fb7426d760bc37" target="_blank"> Dove siamo </a></li>
</ul><?php

break;

    case 'login':?>
<ul>
        <li><a href="#segnalibro">Contatti</a></li>
	<li class ="<?=$vd->getSottoPagina()=='chiSiamo' ?'current_page_item' :'' ?>"><a href="index.php?page=home&subpage=chiSiamo">Chi siamo</a></li>
	<li class="<?= $vd->getSottoPagina() == 'prodotti' ? 'current_page_item' : '' ?>"><a href="index.php?page=home&subpage=prodotti">Prodotti</a></li>
	<li><a href="https://www.google.it/maps/place/Via+Municipio,+8,+08040+Cardedu+OG/@39.798116,9.624075,17z/data=!3m1!4b1!4m2!3m1!1s0x12de3c70f1049c03:0x30fb7426d760bc37" target="_blank"> Dove siamo </a></li>
</ul><?php

    	break;
    default:

           break;  

}             
?>
</div>


