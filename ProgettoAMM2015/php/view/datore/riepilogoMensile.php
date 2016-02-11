<div class="content2">
<div class="input-form">
    <h3>Inserisci mese e anno d'interesse</h3>
    <form method="post" action="index.php?page=datore&subpage=riassuntoMensile<?= $vd->scriviToken('?')?>">
	
			<label for="mese"><strong>Mese:</strong></label>
               <select name="mese">
					<option value="01">Gennaio</option>
					<option value="02">Febbraio</option>
					<option value="03">Marzo</option>
					<option value="04">Aprile</option>
					<option value="05">Maggio</option>
					<option value="06">Giugno</option>
					<option value="07">Luglio</option>
					<option value="08">Agosto</option>
					<option value="09">Settembre</option>
					<option value="10">Ottobre</option>
					<option value="11">Novembre</option>
					<option value="12">Dicembre</option>
				</select>
               <br/>
               <label for="anno"><strong>Anno:</strong></label>
               <input type="anno" name="anno" id="anno" value="2015"/>
               <br/>
		
               <button  type="submit">Filtra</button>
    </form>
</div>
</div>


