<div class="content1">
<h2>Prodotti</h2>

<?php

 if (count($prodotti) > 0) { ?>
    <table>
        <tbody>
            <?php

	foreach ($prodotti as $prodotto) {
                ?>
                <tr >
                    <td><?= $prodotto->getNome()?></br> 
                    <td><?= $prodotto->getDescrizione()?></br> 
		</tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } else { ?>
    <p class="messaggio"> Nessun prodotto inserito </p>
<?php } ?>
</div>
