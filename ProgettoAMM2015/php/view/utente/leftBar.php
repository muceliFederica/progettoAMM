<?php

switch ($vd->getSottoPagina()) {

case 'nuovoOrdine':?>
unset($_SESSION['newOrdine']);
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine<?= $vd->scriviToken('?')?>">Nuovo ordine</a></li>
<p><br><br></p>
</ul>
<img title='culurgionis' alt="Culurgionis" src="../immagini/culurgionis3.jpeg" width="250" height="150"><?
break;
case 'ordini':?>
unset($_SESSION['newOrdine']);
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine<?= $vd->scriviToken('?')?>">Nuovo ordine</a></li>
</ul>
<?
break;
case 'riepilogo':?>
unset($_SESSION['newOrdine']);
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine<?= $vd->scriviToken('?')?>">Nuovo ordine</a></li>
</ul>
<?
break;

case 'profilo':?>
unset($_SESSION['newOrdine']);
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine<?= $vd->scriviToken('?')?>">Nuovo ordine</a></li>
</ul><?
break;

case 'credenziali':?>
unset($_SESSION['newOrdine']);
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente<?= $vd->scriviToken('?')?>">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo<?= $vd->scriviToken('?')?>">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini<?= $vd->scriviToken('?')?>">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine<?= $vd->scriviToken('?')?>">Nuovo ordine</a></li>
</ul><?
break;
default:
break;
}
?>
