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
    if (!empty($panier)){ 
        foreach ($panier as $key => $value) {
            echo "{$key} => {$value} "; //$key est l'identifiant de l'instrument et $value est la quantité
            $this->instrumentAdded = new Instrument();
            $tmp = $this->instrumentAdded->getInstrument($key);  //$key est l'identifiant de l'instrument
            array_push($data, $tmp);
        }
    }
    $vue = new Vue("Panier");
    $vue->generer(array('panier' => $panier, 'data' => $data));
  }

  // Ajout d'un instrument au panier
  public function addInstrumentPanier($idInstr, $qtite){
    $panier = $this->panier->addInstrument($idInstr, $qtite);
    // Pas de vue à générer un message alert pour informer l'utilisateur de l'ajout d'un instrument
  }

  //Vider le panier
  public function clearPanier(){
    $panier = $this->panier->clearPanier();
  }
}