<div class="content2">
<div class="input-form">
    <h3>Modifica credenziali</h3>

    <form id="form" method="post" action="index.php?page=utente">
               <input type="hidden" name="cmd" value="credenziali"/>
	<div id="info">
	</div>
               <label for="username"><strong>Username:</strong></label>
               <input type="text" name="username" class="check" id="username" value="Inserisci nuovo user"/>
		<span id="username"></span>
               <br/>
               <label for="password1"><strong>Password:</strong></label>
               <input type="password" name="password1" class="check" id="password1" value="000"/>
		<span id="password1"></span>
               <br/>
		<label for="password2"><strong> Reinserisci Password:</strong></label>
               <input type="password" name="password2" class="check" id="password2" value="111"/>
		<span id="password2"></span>
               <br/>
               <button type="submit" id=submit name="salva" class="check2">Salva</button>
    </form>
</div>
</div>
