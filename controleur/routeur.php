<?php

require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurInstrument.php';
//require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlInstrument;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlInstrument = new ControleurInstrument();
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
          case 'listing_instruments':
            $this->ctrlInstrument->listingInstruments();
            break;
          case 2:
            echo "i égal 2";
            break;
          default :
            throw new Exception("Action non valide");
        }
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }




/*         if ($_GET['action'] == 'instrument') {
          if (isset($_GET['id'])) {
            $idInstrument = intval($_GET['id']);
            if ($idInstrument != 0) {
              $this->ctrlInstrument->instrument($idInstrument);
            }
            else
              throw new Exception("Identifiant de billet non valide");
          }
          else
            throw new Exception("Identifiant de billet non défini");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }*/
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