<?php

include_once basename(__DIR__) . '/../view/ViewDescriptor.php';
include_once basename(__DIR__) . '/../model/UtenteFactory.php';
include_once basename(__DIR__) . '/../model/User.php';
include_once basename(__DIR__) . '/../model/ProdottoFactory.php';

class BaseController {

    const user = 'user';
    const ruolo = 'ruolo';
    const nessuno = '_nessuno';
    
    public function __construct() {
        
    }

    public function invoke(&$request) {
      
        $vd = new ViewDescriptor();
        
        $vd->setPagina($request['page']);

        $this->setImpostaToken($vd, $request);

	if (isset($request["subpage"])) {
                // inizio switch subpage
                switch ($request["subpage"]) {
                    case 'chiSiamo':
                        $vd->setSottoPagina('chiSiamo');
                        break;
                    case 'prodotti':
						$prodotti = ProdottoFactory::instance()->getProdotti();
                        $vd->setSottoPagina('prodotti');
                        break;
                    case 'login':
						$vd->setSottoPagina('login');
                        break;
                    default:
                        $this->showHome($vd);
                        break;
                }// fine switch subpage
        }
        // gestione input
        if (isset($request["cmd"])) {
            // controllo il comando
            switch ($request["cmd"]) {
                case 'login':
                    $username = isset($request['user']) ? $request['user'] : '';
                    $password = isset($request['password']) ? $request['password'] : '';
                    // Loggo
                    $this->login($vd, $username, $password);
					// inizializzo l'utente
					if($this->loggedIn()) {
                        $user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::ruolo]);
                    }
                    break;   
                default : $this->showHome($vd);
            }
        } else {
            if ($this->loggedIn()) {
                $user = UtenteFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::ruolo]);
                $this->showHome($vd);
            } else {
             
                $this->showHome($vd);
            }
        }
        
     require basename(__DIR__) . '/../view/master.php';
    }
	/**
	*Mostra la pagina di login
	*@param type $vd
	*/
    protected function showLogin($vd) {
        $vd->setTitolo("Login ");
        $vd->setMenu(basename(__DIR__) . '/../view/home/menu.php');
        $vd->setLeftBar(basename(__DIR__) . '/../view/home/leftBar.php');
        $vd->setRightBar(basename(__DIR__) . '/../view/home/rightBar.php');
        $vd->setContent(basename(__DIR__) . '/../view/home/login.php');
    }
    /**
     * Mostra la pagina dell'utente
     * @param type $vd
     */
    protected function showUtente($vd) {
        $vd->setTitolo("Utente");
        $vd->setMenu(basename(__DIR__) . '/../view/utente/menu.php');
        $vd->setLeftBar(basename(__DIR__) . '/../view/utente/leftBar.php');
        $vd->setRightBar(basename(__DIR__) . '/../view/utente/rightBar.php');
        $vd->setContent(basename(__DIR__) . '/../view/utente/content.php');
    }

    /**
     *  Mostra la pagina del datore
     * @param type $vd
     */
    protected function showDatore($vd) {
        $vd->setTitolo(" Datore di lavoro ");
        $vd->setMenu(basename(__DIR__) . '/../view/datore/menu.php');
        $vd->setLeftBar(basename(__DIR__) . '/../view/datore/leftBar.php');
        $vd->setRightBar(basename(__DIR__) . '/../view/datore/rightBar.php');
        $vd->setContent(basename(__DIR__) . '/../view/datore/content.php');
    }
	
	/**
     *  Mostra la home
     * @param type $vd
     */

	protected function showHome($vd) {
        $vd->setTitolo("Pastificio Orru' Home");
        $vd->setContent(basename(__DIR__) . '/../view/home/content.php');
		$vd->setMenu(basename(__DIR__) . '/../view/home/menu.php');
        $vd->setLeftBar(basename(__DIR__) . '/../view/home/leftBar.php');
        $vd->setRightBar(basename(__DIR__) . '/../view/home/rightBar.php');
    }
    
    /**
     *  Mostra, a seconda del ruolo, la pagina dell'utente o la pagina del datore
     * @param type $vd
     */
    protected function showHomeUtente($vd) {
        
        $user= UtenteFactory::instance()->cercaUtentePerId($_SESSION[self::user], $_SESSION[self::ruolo]);
        switch ($user->getRuolo()) {
            // se il ruolo è "utente"
            case User::Utente:
                // mostro la pagina dell'utente
                $this->showUtente($vd);
                break;
            // se il ruolo è "datore"
            case User::Datore:
                // mostro la pagina del datore
                $this->showDatore($vd);
                break;
        }
    }
    
    
    
    /**
     *  Funzione che controlla se esiste un utente che può autenticarsi con $password e $username
     * @param type $vd
     * @param type $username
     * @param type $password
     */
    protected function login($vd, $username, $password) {
        
        $user = UtenteFactory::instance()->caricaUtente($username, $password);
        if (isset($user) && $user->esiste()) {
            $_SESSION[self::user] = $user->getId();
            $_SESSION[self::ruolo] = $user->getRuolo();
            $this->showHomeUtente($vd);
        } else {
		$this->showHome($vd);
		?> <p class="messaggio"> Utente sconosciuto o password errata </p>	<?			
				
        }
    }
    
    /**
     * Funzione che termina una sessione e mostra nuovamente la pagina di login.
     * @param type $vd
     */
    protected function logout($vd) {

        $_SESSION = array();
        if (session_id() != '' || isset($_COOKIE[session_name()])) {
            
            setcookie(session_name(), '', time() - 2592000, '/');
        }
        session_destroy();
        
        
        $this->showHome($vd);
    }
    
    /**
     * Controllo di logged in
     * @return type
     */
    protected function loggedIn() {
        return isset($_SESSION) && array_key_exists(self::user, $_SESSION);
    }
    
    /**
     * Imposta il token
     * @param ViewDescriptor $vd
     * @param type $request
     */
    protected function setImpostaToken(ViewDescriptor $vd, &$request) {

        if (array_key_exists('_nessuno', $request)) {
            $vd->setImpostaToken($request['_nessuno']);
        }
    }

}

?>
