<?php

include_once 'BaseController.php';
include_once basename(__DIR__) . '/../model/OrdineFactory.php';
include_once basename(__DIR__) . '/../model/ProdottoFactory.php';
include_once basename(__DIR__) . '/../model/Ordine.php';

class ControlloUtente extends BaseController {
    public function __construct() {
        parent::__construct();
    }

    public function invoke(&$request) {

        $vd = new ViewDescriptor();

        $vd->setPagina($request['page']);

        $this->setImpostaToken($vd, $request);

        if (!$this->loggedIn()) {
            
            $this->showLogin($vd);
        } 
        else {
            $user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);

            if (isset($request["subpage"])) {
               
                // inizio switch subpage
                switch ($request["subpage"]) {
                   //pagina che mostra il profilo dell'utente
                    case 'profilo':
                        $vd->setSottoPagina('profilo');
                        break;
					//pagina che mostra il riepilogo dell'ordine
					case 'riepilogo':
                        $vd->setSottoPagina('riepilogo');
						break;
					//pagina che permette di modificare le credenziali
                    case 'credenziali':
						
						$vd->setSottoPagina('credenziali');
						
						?><script src="../Ajax/jquery-2.1.4.min.js"></script><?
						//aggiungo lo script per validare i campi
						?><script src="../Ajax/validazione.js"></script><?
						break;
					//pagina per effettuare un nuovo ordine
                    case 'nuovoOrdine':
                        $prodotti = ProdottoFactory::instance()->getProdotti();
                        $vd->setSottoPagina('nuovoOrdine');
                        break;
					//pagina che mostra tutti gli ordini eseguiti dall'utente
                    case 'ordini':
                        $ordini = OrdineFactory::instance()->getOrdiniUtente($user);
                        $vd->setSottoPagina('ordini');
                        break;
                    
                    default:
						
                        $this->showUtente($vd);
                        break;
                } // fine switch subpage
            }
            if (isset($request["cmd"])) {
                // inizio switch comando
                switch ($request["cmd"]) {

                    case 'logout':
                        $this->logout($vd);
                        break;
					//modifico le credenziali
                    case 'credenziali':
						$user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);
						$username = isset($request['username']) ? $request['username'] : '';
                    	$password1 = isset($request['password1']) ? $request['password1'] : '';
                    	$password2 = isset($request['password2']) ? $request['password2'] : '';
						$user->setUser($username);
						$user->setPassword($password1);
						//aggiorno il database
						if(UtenteFactory::instance()->salva($user)!=0)
						{?><p class="messaggio"> Credenziali modificate</p><?}
						else
						{?><p class="messaggio"> Credenziali non modificate. User o password gia' in uso</p><?}

						$this->showUtente($vd);
                        break;
					//annullo l'ordine iniziato.Elimino la variabile di sessione
					case 'modificaOrdine':
						unset($_SESSION['newOrdine']);
						$this->showUtente($vd);
						break;
					//Inserisco un prodotto nel carrello	
					case 'addCarrello':
						$nome=isset($request['prodotto']) ? $request['prodotto'] : '';
                        $prodotto=ProdottoFactory::instance()->getProdottoPerNome($nome);
						$quantita = isset($request['quantita']) ? $request['quantita'] : '';
						if($quantita!=0)
						{
							//se non lo e' inizializzo la variabile di sessione
							if(!isset($_SESSION['newOrdine']))
							{	
								$_SESSION['newOrdine']=new Ordine();
							}
							$_SESSION['newOrdine']->aggiungiProdotto($prodotto,$quantita);
						}
						$this->showUtente($vd);
						break;
					//salvo il nuovo ordine nel database
					case'completaOrdine':
						$data = isset($request['date']) ? $request['date'] : '';
						$somma= isset($request['somma']) ? $request['somma'] : '';
						OrdineFactory::instance()->salva($_SESSION['newOrdine'],$somma,$data);
						unset($_SESSION['newOrdine']);
						$this->showHomeUtente($vd);
						break;
                    default : $this->showUtente($vd);
					break;
                         
                }// fine switch comando
            } else {
                    $user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);
                    $this->showUtente($vd);
                }
        }
        require basename(__DIR__) . '/../view/master.php';
    }
 
}

?>
