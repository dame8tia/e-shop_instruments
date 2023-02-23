<?php

require_once 'modele/instrument.php';
require_once 'vue/vue.php';

class ControleurAccueil {

  private $accueil;

  public function __construct() {
    $this->accueil = new Instrument();
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $instruments = $this->accueil->getInstruments();
    $vue = new Vue("accueil");
    $vue->generer(array('instruments' => $instruments));;//$vue->generer()
  }
}