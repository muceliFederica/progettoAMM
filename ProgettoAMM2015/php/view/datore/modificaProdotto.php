<div class="content2">
<div class="input-form">
<h3>Modifica prodotto</h3>
<?php $nome=isset($request['prodotto']) ? $request['prodotto'] : '';

$prodotto=ProdottoFactory::instance()->getProdottoPerNome($nome); 
$prezzo=$prodotto->getPrezzo();
$descrizione=$prodotto->getDescrizione();?>   
<form method="post" action="index.php?page=datore&prodotto=<?= $nome ?>">
        <input type="hidden" name="cmd" value="salvaProdotto"/>       
        <label for="prezzo"><strong>Prezzo</strong></label>
        <input type="number point" name="prezzo" id="prezzo" value="<?= $prezzo ?>"/>
        <br>
        <label for="descrizione"><strong>Descrizione</strong></label>
        <input type="text" name="descrizione" id="descrizione" value="<?= $descrizione ?>"/> 
        <br/>
        <button type="submit"> Salva</button>
    </form>
<form method="post" action="index.php?page=datore&cmd=annulla">
	<button type="submit"> Annulla</button>
  </form>
</div>
</div>

