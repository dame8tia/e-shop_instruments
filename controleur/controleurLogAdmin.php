<?php
require_once 'vue/vue.php';

class ControleurLogAdmin {

  private $login;

  public function __construct() {
    //Pas d'instanciation à faire
  }
  
  // Teste si l'admin est loggé, si non envoi page v_login accessible depuis login()
  public function connecte(){
    if (!empty($_SESSION["mdp_admin"])){ //si la session existe déjà
      header('Location: //localhost/instruments/index.php?action=listing_instruments');
      exit();
    }

    if (!empty($_POST['pwd_admin'])){// si formulaire posté initialisation de la variable $session
      session_start();
      $_SESSION["mdp_admin"]=HtmlEntities($_POST['pwd_admin']);
      header('Location: //localhost/instruments/index.php?action=listing_instruments');
    }
    else {
      $this->login();
    }
  }

  public function seDeconnecter(){
    unset($_SESSION['mdp_admin']);
    header('Location: //localhost/instruments/index.php');
  }
  // Affiche la page login 
  public function login() {
    $vue = new Vue("login");
    $vue->generer(array());
  }
}