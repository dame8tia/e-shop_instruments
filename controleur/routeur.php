<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurInstrument.php';
require_once 'controleur/controleurPanier.php';
require_once 'controleur/controleurLogAdmin.php';
require_once 'controleur/controleurCommande.php';
require_once 'config.php';

class Routeur {

  private $ctrlAccueil ;
  private $ctrlInstrument ;
  private $ctrlPanier ;
  private $ctrlLogin ;
  private $ctrlCde ;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlInstrument = new ControleurInstrument();
    $this->ctrlPanier = new ControleurPanier();
    $this->ctrlLogin = new ControleurLogAdmin();
    $this->ctrlCde = new ControleurCommande();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'instrument':
            if (isset($_GET['id'])) {
              $idInstrument = intval($_GET['id']);
              if ($idInstrument != 0) {
                $this->ctrlInstrument->instrument($idInstrument);
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            else
              throw new Exception("Identifiant instrument non défini");  
            break;
          
          case 'listing_instruments': // back office admin
            
            //Etat de la session avant de recupérer la valeur
            if (session_status()!='PHP_SESSION_ACTIVE'){
              session_start();//obligatoire pour accéder à la valeur de la session
            }   
            //var_dump($_SESSION['mdp_admin']);        
            //unset($_SESSION['mdp_admin']); // retirer les informations de la session
            if (isset($_SESSION['mdp_admin'])){
              if($_SESSION['mdp_admin']===MDP_BACKOFFICE){
                $this->ctrlInstrument->listingInstruments();
              }
              else {
                unset($_SESSION['mdp_admin']);
                $this->ctrlLogin->login();
              }              
            }
            else {
              $this->ctrlLogin->connecte();
              }
            break;
          case "seDeconnecter":
            if (session_status()!='PHP_SESSION_ACTIVE'){
              session_start();//obligatoire pour accéder à la valeur de la session
            }
            $this->ctrlLogin->seDeconnecter();
            break;
          
          case "panier":
            if (isset($_GET['id'])) {
              $idInstrument = intval($_GET['id']);
              if ($idInstrument != 0) {
                $qtite = 1;
                //$qtite = readline('Enter la quantité souhaitée : '); // méthode pour le terminal
                $this->ctrlPanier->addInstrumentPanier($idInstrument, $qtite); 
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            elseif (isset($_GET['idplus'])){// : plus utilisée
              // augmente de 1 la quantité commandée
              $idInstrument = intval($_GET['idplus']);
              if($idInstrument!=0){
                $qtite = 1;
                //$qtite = readline('Enter la quantité souhaitée : '); // méthode pour le terminal
                $this->ctrlPanier->addInstrumentPanier($idInstrument, $qtite); 
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            elseif (isset($_GET['idmoins'])){// : plus utilisée
              // diminue de 1 la quantité commandée
              $idInstrument = intval($_GET['idmoins']);
              if($idInstrument!=0){
                $nb = 1;
                $this->ctrlPanier->reduceQuantity($idInstrument, $nb); 
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            else // index.php?action=panier // sans id ; le panier doit s'afficher
              {
                // Lancer la fonction getPanier via le controller
                $this->ctrlPanier->getPanier();                
              }  
            break;
          case "panierModify":            
            if(isset($_GET['id']) && isset($_GET['value'])){   
              echo "routeur OK + id-val";             
              $idInstrument = intval($_GET['id']);
              $quantite = intval($_GET['value']);
              $this->ctrlPanier->modifyQtte($idInstrument, $quantite); 
            }
            break;
          case "clearPanier":
            $this->ctrlPanier->clearPanier();
            // pas nécessaire : header('Location: //localhost/instruments/index.php?action=panier');
            // or die();
            exit();
          
          case 'retirerInstrPanier':
            if(isset($_GET['id'])){
              $idInstrument = intval($_GET['id']);
              if ($idInstrument != 0) {
                $this->ctrlPanier->delInstrumentPanier($idInstrument); 
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            break ;
          case "validerPanier":
            if(isset($_GET['total'])){
              $montant = floatval($_GET['total']);
              $idClient = intval($_GET['idClt']);
              $this->ctrlCde->addCommande($montant, $idClient);
            }
            else
                echo "Problème sur le montant de la commande";            
            break;
            
          case "listing_commande":// back Office
            
            //Etat de la session avant de recupérer la valeur
            if (session_status()!='PHP_SESSION_ACTIVE'){
              session_start();//obligatoire pour accéder à la valeur de la session
            }   
            
            if (isset($_SESSION['mdp_admin'])){
              if($_SESSION['mdp_admin']===MDP_BACKOFFICE){
                $this->ctrlCde->getCommandes();
              }
              else {
                unset($_SESSION['mdp_admin']);
                $this->ctrlLogin->login();
              }              
            }
            else {
              $this->ctrlLogin->connecte();
              }
            break;
          case 'suppMaCde':
            if(isset($_GET['idCde'])){
              $idCde = intval($_GET['idCde']);
              if ($idCde != 0) {
                $this->ctrlCde->cancelCde($idCde); 
              }
              else
                throw new Exception("Identifiant instrument non valide");
            }
            break ;
          default :
            throw new Exception("Action non valide");
        }
      }
      else {  // aucune action définie - Affichaga par défaut : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    } 
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}