<?php

abstract class Modele {

  // Objet PDO d'accès à la BD
  private $bdd;

  // Exécute une requête SQL éventuellement paramétrée
  protected function executerRequete(string $sql, $params = null) {
    
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql);    // exécution directe
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);  // requête préparée
      $resultat->execute($params);
      echo $this->getBdd()->lastInsertId();
    }
    return $resultat;
  }

  // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
  private function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      $this->bdd = new PDO('mysql:host='.HOST.';dbname='.BDNAME.';charset=utf8',
        USER, PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    //
    return $this->bdd;
  }

}
