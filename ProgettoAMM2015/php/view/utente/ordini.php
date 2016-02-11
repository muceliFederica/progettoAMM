<div class="content2">
<h3>Ordini completati
da <?= $user->getNome() ?> <?= $user->getCognome() ?> </h3>


<?php
 if (count($ordini) > 0) { ?>
    <table>
        <thead>
            <tr>
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
                    ?>
                    <tr <?= $k % 2 == 0 ? 'class="alt-row"' : '' ?>>
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
    <p class="messaggio"> Nessun ordine presente </p>
<?php } ?>
</div>
