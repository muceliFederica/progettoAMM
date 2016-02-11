<div class="content3">
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
	
    <table>
        <thead>
            <tr>
		<th>Cliente</th>
                <th>Codice Ordine </th> 
                <th>Prezzo totale</th>
                <th>Prodotti</th>
		<th>Data consegna</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $k = 0;
            foreach ($ordini as $ordine) {
                    
			$user = UtenteFactory::instance()->cercaUtentePerId($ordine->getUtente(), User::Utente);
                    ?><tr <?= $k % 2 == 0 ? 'class="alt-row"' : '' ?>>
			<td><?=$user->getNome() .' '. $user->getCognome()?></td>
                        <td><?= $ordine->getCodice() ?></td>
                        <td><?= $ordine->getPrezzo() ?></td> 
			<td>
                        
                           <?php 
                            for ($i=0;$i<count($ordine->getContenuto());$i++){?>
                                <p><?=$ordine->contenuto[$i]->getNome() .'</br> '. $ordine->quantita[$i] . 'kg'?> </p> <?
                            }?>
                           
                        
                    </td>
			<td><?= $ordine->getData() ?></td>
                    </tr>
                    <?php
                    $k++;
            }
            ?>
        </tbody>
    </table>
<?php } else { ?>
    <p class="messaggio"> Nessun ordine presente relativamente al mese e all'anno selezionati </p>
<?php } ?>
</div>

