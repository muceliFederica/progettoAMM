<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Descrizione dell'applicazione</title>
    </head>
    
    <body>
        
        <ul>
            <li><h2><strong> Descrizione dell'applicazione </strong></h2></li>
        </ul>
        <p> 
		L'applicazione gestisce prodotti offerti da un pastificio alla propria clientela.<br>
            I prodotti si caratterizzano per: <br>
        </p>
            <ol>
                <li>Nome</li>
                <li>Prezzo</li>
                <li>Descrizione</li>
                <li>I prodotti possono essere aggiunti ad un ordine</li>
            </ol>
		<p>
			L'applicazione permette di navigare anche senza autenticarsi. Un'utente non autenticato puo' vedere i contatti, 
			un elenco dei prodotti proposti e la pagina Chi Siamo che da' alcune informazioni sull'attivita'.
		</p>
        <p>
            L'applicazione ha due ruoli: <b> utente </b> e <b> datore</b>.
        </p>
        
        <p>
            Il ruolo <b>utente</b> rappresenta un cliente del pastificio. Una volta autenticato con ruolo utente 
            (nella pagina di login) è possibile:<br>
        </p>
       
            <ol>
                <li>Accedere al profilo e modificare le proprie credenziali</li>
                <li>Visualizzare tutti gli ordini conclusi dall'utente</li>
                <li>Effettuare un nuovo ordine. Viene visualizzato un elenco dei prodotti. L'utente puo' specificare la quantita' del prodotto 
		desiderato e aggiungerlo al carrello. Il cliente puo' continuare ad aggiungere prodotti al proprio carrello fin quando decide di
		concludere l'ordine. Verra' allora mostrato un riepilogo dell'ordine, il totale dell'ordine e sara' richiesto di inserire la data di
		consegna desiderata. Per l'implementazione del carrello viene utilizzata una variabile di sessione.</li>
            </ol>
        
        <p>
            Il ruolo <b>datore</b> rappresenta un datore di lavoro che gestisce il pastificio.
            Una volta autenticato con ruolo datore (nella pagina di login) è possibile:<br>
        </p>
        
            <ol>
                 <li>Accedere al profilo e modificare le proprie credenziali</li>
                 <li>Vedere gli ordini da consegnare(la data di consegna e' successiva alla data attuale)</li>
                 <li>Gestire i prodotti: il datore puo' aggiungere un nuovo prodotto, modificare le caratteristiche di un prodotto(prezzo e descrizione)
				 ,eliminare un prodotto</li>
                 <li>Selezionare un mese e un anno e vedere i numero di ordini conclusi e la somma guadagnata in quel mese. 
					Puo' inoltre vedere i dettagli, ossia tutti gli ordini conclusi  </li>
            </ol>
        
        <br>
        <p>
            L'applicazione consente di passare da un ruolo all'altro attraverso <b> logout </b> e successivo 
            <b> login</b>.
        </p>
        <br>
        
        <ul>
            <li><h2><strong> Elenco dei requisiti  soddisfatti </strong></h2></li>
        </ul>
        
            <ol>
                <li>Utilizzo di HTML e CSS (HTML presente in molte pagine php (cartella php); CSS presente nella pagina css/layout.css)</li>
                <li>Utilizzo di PHP e MySQL (PHP presente in molte pagine php (cartella php); MySQL presente in molte pagine php (cartella php)</li>
                <li>Utilizzo del pattern MVC (le cartelle all'interno del progetto sono suddivise in "model-view-controller")</li>
                <li>Due ruoli (come già detto in precedenza, ruolo utente e ruolo datore)</li>
                <li>Una transazione (con piu' query tra autocommit(); e commit(); la transazione è implementata 
                    nella classe php/model/OrdineFactory.php all'interno della funzione <b>salva().
		Un ordine viene aggiunto al database solamente se vengono aggiunti correttamente tutti gli ingredienti contenuti nell'ordine </b>;</li>
                <li>Una funzionalità ajax (vedere Ajax/validazione.js </li>
            </ol>
        
        <p>
            Per quanto riguarda la funzionalità ajax essa riguarda la validazione della password e della
            username quando uno dei due ruoli decide di modificare le credenziali. In particolare:
            viene mostrato un focus che si modifica a seconda del campo del form in cui ci si trova. 
			Inoltre al click sul tasto submit vengono validati i campi: non vengono accettati valori nulli e le due password devono coincidere.
			Se qualche criterio non viene rispettato viene mostrata una finestra che mostra l'errore senza che la pagina venga ricaricata.
        </p>
        <br>
        
        <ul>
            <li><h2><strong> Credenziali di autenticazione, link alla homepage e alla repository git</strong></h2></li>
        </ul>
        
        <p> <strong> Credenziali</strong> </p>
            <ul>
                <li>ruolo utente
                    <ul>
                        <li> username: fede</li>
                        <li> password: amm</li>
                    </ul>
                <li>ruolo datore
                    <ul>
                        <li> username: spano</li>
                        <li> password: amm</li>
                    </ul>
            </ul>
        
        <p> <strong> Homepage</strong> </p>
        <ul>
            <li> <a href="http://spano.sc.unica.it/amm2015/muceliFederica/ProgettoAMM2015/php/index.php?page=home">http://spano.sc.unica.it/amm2015/muceliFederica/ProgettoAMM2015/php/index.php?page=home</a></li>
        </ul>
        
        <p> <strong> Link alla repository </strong> </p>
        <ul>
            <li> <a href="https://github.com/muceliFederica/progettoAMM"> https://github.com/muceliFederica/progettoAMM</a></li>
        </ul>
    </body>
</html>

