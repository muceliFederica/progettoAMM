
<?php

switch ($vd->getSottoPagina()) {
    case 'riepilogo':
        include_once 'riepilogo.php';
        break;
default:
?>
<div class="content2">
<h3> Nuovo ordine per
<?= $user->getNome() ?> <?= $user->getCognome() ?> </h3>
<?php
if (count($prodotti) > 0) { ?>
    <table>
        <thead>
       		<tr>
		        <th >Nome</th>
		        <th >Prezzo</th>
				<th >Quantita</th>
				<th >Aggiungi al carrello</th>
			</tr> 
		</thead>
		<tbody>
		<?php
				foreach ($prodotti as $prodotto) {
				$nome=$prodotto->getNome() ;
                ?>
				
			<tr>
				<td><p><?=$nome ?></p></td>
                <td><p><?= $prodotto->getPrezzo() .' euro al kg'?></p></td>
				<td>	
					<form method="post" action="index.php?page=utente&subpage=nuovoOrdine&prodotto=<?= $nome ?>">
						<input type="hidden" name="cmd" value="addCarrello"/>
						<label for="quantita">Kg</label>
						<input class="inp" type="number point" name="quantita" value="0"/>
						<td><input class="carrello" type="image" src="../immagini/carrello.png" width="40" height="40" alt="Modifica"/></td>
					</form>
			   	</td>
			</tr>
                <?php
				
            }?>
		</tbody>
    </table>
			
			
			<form method="post" action="index.php?page=utente&subpage=riepilogo<?= $vd->scriviToken('?') ?>">
				<button type="submit"">Completa ordine</button>
			</form>
<?php } else { ?>
    <script>window.alert("Nessun prodotto inserito");</script>
<?php } 
break;
}
?>
</div>
