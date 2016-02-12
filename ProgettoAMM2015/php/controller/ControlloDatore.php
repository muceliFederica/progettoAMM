<?php

include_once 'BaseController.php';
include_once basename(__DIR__) . '/../model/OrdineFactory.php';
include_once basename(__DIR__) . '/../model/ProdottoFactory.php';
include_once basename(__DIR__) . '/../model/Ordine.php';

class ControlloDatore extends BaseController {

	
	

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
                    
                    // profilo dell'utente
                    case 'profilo':
                        $vd->setSottoPagina('profilo');
                        break;
					case 'modificaProdotto':
                        $vd->setSottoPagina('modificaProdotto');
                        break;

					case 'inserisciProdotto':
                        $vd->setSottoPagina('inserisciProdotto');
                        break;

					case 'gestioneProdotti':
						$prodotti = ProdottoFactory::instance()->getProdotti();
                        $vd->setSottoPagina('gestioneProdotti');
						break;
                   
                    case 'credenziali':
						$vd->setSottoPagina('credenziali');
						?><script src="../Ajax/jquery-2.1.4.min.js"></script><?
						
						?><script src="../Ajax/validazione.js"></script><?
						break;
                    case 'riepilogoMensile':                      
                        $vd->setSottoPagina('riepilogoMensile');
                        break;
					case 'riassuntoMensile':
						$mese=isset($request['mese']) ? $request['mese'] : '';
						$anno=isset($request['anno']) ? $request['anno'] : '';
						$ordini= OrdineFactory::instance()->getOrdiniFiltrati($mese,$anno);
						$vd->setSottoPagina('riassuntoMensile');
						break;
					case 'ordiniPerMese':
						$mese=isset($request['mese']) ? $request['mese'] : '';
						$anno=isset($request['anno']) ? $request['anno'] : '';
						$ordini= OrdineFactory::instance()->getOrdiniFiltrati($mese,$anno);
						$vd->setSottoPagina('ordiniPerMese');
						break;

                    case 'ordini':
                        $ordini = OrdineFactory::instance()->getOrdiniDaConsegnare();
                        $vd->setSottoPagina('ordini');
                        break;
                    
                    default:
						
                        $this->showDatore($vd);
                        break;
                } // fine switch subpage
            }
            if (isset($request["cmd"])) {
                // inizio switch comando
                switch ($request["cmd"]) {

                    case 'logout':
                        $this->logout($vd);
                        break;

                    case 'credenziali':
						$user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);
						$username = isset($request['username']) ? $request['username'] : '';
                    	$password1 = isset($request['password1']) ? $request['password1'] : '';
                    	$password2 = isset($request['password2']) ? $request['password2'] : '';
						$user->setUser($username);
						$user->setPassword($password1);

						if(UtenteFactory::instance()->salva($user)!=0)
						{?><p class="messaggio"> Credenziali modificate</p><?}
						else
						{?><p class="messaggio"> Credenziali non modificate. User o password gia' in uso</p><?}
						$this->showDatore($vd);
                        break;

				case 'salvaProdotto':
						
						$prezzo=isset($request['prezzo']) ? $request['prezzo'] : '';
						$descrizione=isset($request['descrizione']) ? $request['descrizione'] : '';
						$nome=isset($request['prodotto']) ? $request['prodotto'] : '';
						$prodotto=ProdottoFactory::instance()->getProdottoPerNome($nome);
						$prodotto->setPrezzo($prezzo);
						$prodotto->setDescrizione($descrizione);
						ProdottoFactory::instance()->salvaModifiche($prodotto);
						$this->showDatore($vd);
						break;
				case 'annulla':
						
                        			$this->showDatore($vd);
						break;
				case 'eliminaProdotto':
						$nome=isset($request['prodotto']) ? $request['prodotto'] : '';
						ProdottoFactory::instance()->elimina($nome);
						$this->showDatore($vd);
						break;
				
				case 'inserisciProdotto':
						$prezzo=isset($request['prezzo']) ? $request['prezzo'] : '';
						$descrizione=isset($request['descrizione']) ? $request['descrizione'] : '';
						$nome=isset($request['nome']) ? $request['nome'] : '';
						ProdottoFactory::instance()->inserisciProdotto($nome,$prezzo,$descrizione);
						$this->showDatore($vd);
						break;
				default : $this->showDatore($vd);
					break;
                         
                }// fine switch comando
            } else {
                    $user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[BaseController::user], $_SESSION[BaseController::ruolo]);
                    $this->showDatore($vd);
                }
        }
        require basename(__DIR__) . '/../view/master.php';
    }


private function getProdottoPerId(&$prodotti,&$request)
{

                   
            if (isset($request['prodotto'])) {
            	// indice per prodotto definito, verifichiamo che sia un intero
            	$intVal = filter_var($request['prodotto'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            	if (isset($intVal) && $intVal > -1 && $intVal < count($prodotti)) {
                	return $prodotti[$intVal];
				}
			}
        
}

  
}

?>
