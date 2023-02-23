<?php

require_once 'modele/instrument.php';
require_once 'vue/vue.php';

class ControleurInstrument {

  private $instrument;

  public function __construct() {
    $this->instrument = new Instrument();
  }

  // Affiche la liste de tous les billets du blog
  public function instrument($idInstrument) {
    $instrument = $this->instrument->getInstrument($idInstrument);
    $vue = new Vue("instrument");
    $vue->generer(array('instrument' => $instrument));;//$vue->generer()
  }

  // Affiche la liste de tous les billets du blog
  public function listingInstruments() {
    $instruments = $this->instrument->getInstruments();
    $vue = new Vue("listingInstruments");
    $vue->generer(array('instruments' => $instruments));;//$vue->generer()
  }
}