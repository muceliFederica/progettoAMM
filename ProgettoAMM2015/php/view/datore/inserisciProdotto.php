<div class="content2">
<div class="input-form">
<h3>Inserisci prodotto</h3>



	<form method="post" action="index.php?page=datore">
        <input type="hidden" name="cmd" value="inserisciProdotto"/> 
	<label for="nome"><strong>Nome</strong></label>
        <input type="text" name="nome" id="nome" value=""/> 
        <br/>      
        <label for="prezzo"><strong>Prezzo</strong></label>
        <input type="number point" name="prezzo" id="prezzo" value=""/>
        <br>
        <label for="descrizione"><strong>Descrizione</strong></label>
        <input type="text" name="descrizione" id="descrizione" value=""/> 
        <br/>
        <button type="submit">Salva</button>
    </form>
	<form method="post" action="index.php?page=datore<?= $vd->scriviToken('?')?>">
	
	<input type="hidden" name="cmd" value="annulla"/>
		<button type="submit">Annulla</button>
	</form>
	
</div>
</div>

