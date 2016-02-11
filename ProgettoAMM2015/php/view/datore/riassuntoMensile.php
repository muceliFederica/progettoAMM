<div class="content2">
<h3> Ordini filtrati </h3> 

<?php 

if (count($ordini) > 0) { ?>
	<?php
	$somma=0;
	foreach ($ordini as $ordine)
	{
		$somma=$somma+$ordine->getPrezzo();	
	}?>
	<p>Numero ordini completati nel mese  <?=$mese .' ' . $anno?> :<strong> <?=count($ordini)?></strong></p>
	<p>Ricavo mensile :<strong> <?=$somma?> Euro</strong></p>
	<form method="post" action="index.php?page=datore&subpage=ordiniPerMese&mese=<?=$mese ?>&anno=<?=$anno?><?= $vd->scriviToken('?')?>">
				<button type="submit"">Mostra dettagli</button>
	</form><?
 } else { ?>
    <p class="messaggio"> Nessun ordine presente relativamente al mese e all'anno selezionati </p>
<?php } ?>
</div>
