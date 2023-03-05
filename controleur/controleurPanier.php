<?php

require_once 'modele/panier.php';
require_once 'modele/instrument.php';
require_once 'vue/vue.php';

class ControleurPanier {

  private $panier;
  private $instrumentAdded;

  public function __construct() {
    $this->panier = new Panier();
  }

  // Affiche les instruments du panier
  public function getPanier() {
    $panier = $this->panier->getPanier();
    $data = [];
    // Récupération des caractéristiques de l'instrument Class Instrument (Modele)
    if (!empty($panier)){ 
        foreach ($panier as $key => $value) {
            //echo "{$key} => {$value} "; //$key est l'identifiant de l'instrument et $value est la quantité
            $this->instrumentAdded = new Instrument();
            $tmp = $this->instrumentAdded->getInstrument($key);  //$key est l'identifiant de l'instrument
            array_push($data, $tmp);
        }
        $vue = new Vue("Panier");
        $vue->generer(array('panier' => $panier, 'data' => $data));
    }
    else {
      //echo "Modele panier vide (cookie)";
      $vue = new Vue("Panier");
      $vue->generer(array()); 
    }

  }

  // Ajout d'un instrument au panier : 1ere méthode - index.php?action=panier&idplus=x
  public function addInstrumentPanier($idInstr, $qtite){
    $panier = $this->panier->addInstrument($idInstr, $qtite);
    // affiche ensuite le panier mis à jour (méthode de cette classe)
    $panier = $this->getPanier();
  }

  // Diminuer la quantité d'instrument commandée : 1ere méthode - index.php?action=panier&idmoins=x
  public function reduceQuantity($id, $nb){
    $panier = $this->panier->reduceQtity($id, $nb);
    $panier = $this->getPanier();
  }

  // Retirer un instrument du panier
  public function delInstrumentPanier($idInstr){
    $panier = $this->panier->delInstrument($idInstr);
    // affiche ensuite le panier mis à jour (méthode de cette classe)
    $panier = $this->getPanier();
  }



  // modifier la quantité avec fct JS addEventListener
  public function modifyQtte($idInstrument, $quantite){
    $panier = $this->panier->updateQtity($idInstrument, $quantite);
    $panier = $this->getPanier();
  }

  //Vider le panier
  public function clearPanier(){
    $panier = $this->panier->clearPanier();
    $panier = $this->getPanier();
  }
}