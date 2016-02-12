<div class="content2">
    <h3>Dati personali di
    <?= $user->getNome() ?> <?= $user->getCognome() ?></h3>


	<p>Nome: <?= $user->getNome() ?> </p>
	<p>Cognome: <?= $user->getCognome() ?> </p>
	<p>Email: <?= $user->getEmail() ?> </p>
	<p>Telefono: <?= $user->getTelefono() ?> </p>
	<p>Indirizzo: <?= $user->getVia() . ' n. ' . $user->getCivico() ?> </p>
	<p>Città: <?= $user->getCitta() ?> (<?= $user->getProvincia() ?>) </p>
	<p>Cap: <?= $user->getCap() ?> </p>

	<form method="post" action="index.php?page=utente&subpage=credenziali<?= $vd->scriviToken('?') ?>">
			<button type="submit"">Modifica credenziali</button>
	</form>
</div>

               

