<?php

require_once 'vue/Vue.php';

class ControleurErreur {

  private $msgErreur;

  // Affiche une erreur
  public function erreur($msgErreur) {
    require 'vue/v_erreur.php';
  }
}