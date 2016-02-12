<div class="content2">
<h3>Dati personali di
    <?= $user->getNome() ?> <?= $user->getCognome() ?></h3>

	
	<p><strong>Nome:</strong> <?= $user->getNome() ?> </p>
	<p><strong>Cognome:</strong> <?= $user->getCognome() ?> </p>
	<p><strong>Email:</strong> <?= $user->getEmail() ?> </p>
	<p><strong>Telefono:</strong> <?= $user->getTelefono() ?> </p>
	<p><strong>Indirizzo:</strong> <?= $user->getVia(). ' n. '. $user->getCivico() ?> </p>
	<p><strong>Città:</strong> <?= $user->getCitta() ?> (<?= $user->getProvincia() ?>) </p>
	<p><strong>Cap:</strong> <?= $user->getCap() ?> </p>

	
	<form method="post" action="index.php?page=datore&subpage=credenziali<?= $vd->scriviToken('?') ?>">
			<button type="submit"">Modifica credenziali</button>
	</form>
</div>
