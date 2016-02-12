<?php

switch ($vd->getSottoPagina()) {

case 'nuovoOrdine':
?><ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li>
<p><br><br></p>
</ul>
<img title='culurgionis' alt="Culurgionis" src="../immagini/culurgionis3.jpeg" width="250" height="150"><?
break;
case 'ordini':
if (isset ($_SESSION['newOrdine']))unset($_SESSION['newOrdine']);
?>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li>
</ul>
<?
break;
case 'riepilogo':?>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li>
</ul>
<?
break;

case 'profilo':
if (isset ($_SESSION['newOrdine']))unset($_SESSION['newOrdine']);
?>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li>
</ul><?
break;

case 'credenziali':
if (isset ($_SESSION['newOrdine']))unset($_SESSION['newOrdine']);
?>
<ul>
    <li class="<?= $vd->getSottoPagina() == 'home' || $vd->getSottoPagina() == null ? 'current_page_item' : ''?>"><a href="index.php?page=utente">Home</a></li>
    <li><a href="#segnalibro">Contatti</a></li>
    <li class="<?= $vd->getSottoPagina() == 'profilo' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=profilo">Dati personali</a></li>
    <li class="<?= $vd->getSottoPagina() == 'ordini' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=ordini">Ordini completati</a></li>
    <li class="<?= $vd->getSottoPagina() == 'nuovoOrdine' ? 'current_page_item' : '' ?>"><a href="index.php?page=utente&subpage=nuovoOrdine">Nuovo ordine</a></li>
</ul><?
break;
default:
break;
}
?>
