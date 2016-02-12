<div class="content3">
<h3 >Prodotti</h3>

<?php if (count($prodotti) > 0) { ?>
    <table>
        <thead>
       		<tr>
		        <th >Nome</th>
		        <th >Descrizione</th>
		        <th >Prezzo</th>
				<th >Modifica</th>
				<th >Cancella</th>
			</tr> 
		</thead>
		<tbody>
		<?php
				foreach ($prodotti as $prodotto)
				{
				$nome=$prodotto->getNome();
				?>
                <tr >
                    <td><?= $prodotto->getNome()?></br></td>
                    <td class="descrizione"><?= $prodotto->getDescrizione()?></br></td>
					<td><?= $prodotto->getPrezzo(). ' /kg'?></br> </td>
					<td>
                        <a href="index.php?page=datore&subpage=modificaProdotto&prodotto=
						<?= $nome ?>" title="Modifica prodotto">
                            <img  src="../immagini/modifica.png" width="40" height="40" alt="Modifica"></img>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=datore&cmd=eliminaProdotto&prodotto=
						<?= $nome ?>" title="Elimina prodotto">
                            <img  src="../immagini/cancella.png" width="40" height="40" alt="Elimina"></img>
                        </a>
                    </td>
				</tr>
		<?
			}?>
		</tbody>
    </table>
	<div>
		<form method="post" action="index.php?page=datore&subpage=inserisciProdotto">
				<button type="submit">Inserisci prodotto</button>
		</form>
	</div>
<?php
 	}else{?> <p class="messaggio"> Nessun prodotto inserito </p>
			<div>
				<form method="post" action="index.php?page=datore&subpage=inserisciProdotto">
						<button type="submit">Inserisci prodotto</button>
				</form>
			</div>
	<?php	}?>
</div>

