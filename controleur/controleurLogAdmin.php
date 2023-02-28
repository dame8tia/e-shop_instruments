<?php
require_once 'vue/vue.php';

class ControleurLogAdmin {

  private $login;

  public function __construct() {
    //Pas d'instanciation à faire
  }

  // Affiche la page login 
  protected function login() {
    $vue = new Vue("login");
    $vue->generer(array());
  }
  
  public function connecte(){
    if (isset($_POST['pwd_admin'])){
        echo $_POST['pwd_admin'];
    }
    else {
        $this->login();
    }
  }
}