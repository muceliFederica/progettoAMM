<?php 
 include_once 'controller/BaseController.php';
 include_once 'controller/ControlloUtente.php';
 include_once 'controller/ControlloDatore.php';

 date_default_timezone_set("Europe/Rome");
 FrontController::dispatch($_REQUEST);
 
 class FrontController {
     
    public static function dispatch(&$request) {
        // inizio sessione
        session_start();
        if (isset($request["page"])) {

            switch ($request["page"]) {
				case "home":
                    // gestisce il controllo principale. Le operazioni eseguibili da tutti.
                    $controllo = new BaseController();
                    $controllo->invoke($request);
                    break;
                
                // se siamo nella pagina dell'utente
                case 'utente':
                    // gestisce il controllo dell'utente
                    $controllo = new ControlloUtente();
                    if (isset($_SESSION[BaseController::ruolo]) && $_SESSION[BaseController::ruolo] != Utente::Utente) {}
                    $controllo->invoke($request);
                    break;
               
                // se siamo nella pagina del datore
                case 'datore':
                    // gestisce il controllo del datore
                    $controllo = new ControlloDatore();
                    if (isset($_SESSION[BaseController::ruolo]) && $_SESSION[BaseController::ruolo] != Utente::Datore) {}
                    $controllo->invoke($request);
                    break;
                
                // se la pagina e' inesistente
                default:
                    echo 'Siamo spiacenti ma la pagina a cui si cerca di accedere &egrave; inesistente';
                    break;
           }
        } else {
           echo 'Siamo spiacenti ma la pagina a cui si cerca di accedere &egrave; inesistente';
        }
    }
 }
?>
