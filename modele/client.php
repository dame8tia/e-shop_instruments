<?php

// Modèle pour l'entité Instrument

require_once('modele.php');

class Client extends Modele{

  // Renvoie la liste des clients 
  public function getClients():PDOStatement {
   
    $sql = 'SELECT * FROM client';
    $clients = $this->executerRequete($sql);
    return $clients;
  }

  // Renvoie les informations pour un instrument en particulier
  public function getClient(int $idClient):array {// en sortie un array. fetch()
    $sql = 'SELECT * FROM client '
      . 'WHERE id_clt = ?';
    $client = $this->executerRequete($sql, array($idClient));
    if ($client->rowCount() == 1)
      return $client->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun client ne correspond à l'identifiant '$idClient'");
    }
}

