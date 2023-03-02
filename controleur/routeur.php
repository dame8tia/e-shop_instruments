<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurInstrument.php';
require_once 'controleur/controleurPanier.php';
require_once 'controleur/controleurLogAdmin.php';
require_once 'config.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlInstrument;
  private $ctrlPanier ;
  private $ctrlLogin ;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlInstrument = new ControleurInstrument();
    $this->ctrlPanier = new ControleurPanier();
    $this->ctrlLogin = new ControleurLogAdmin();
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
            elseif (isset($_GET['idplus'])){
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
            elseif (isset($_GET['idmoins'])){
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
          case "clearPanier":
            $this->ctrlPanier->clearPanier();
            echo "<script> alert('Panier vidé')</script>";
            header('Location: //localhost/instruments/index.php?action=panier');
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
            if (isset($_POST)){
              echo "A FAIRE Ajouter un enregistrement dans la BDD table commande</br>";
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