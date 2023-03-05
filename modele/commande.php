<?php

// Modèle pour l'entité Instrument

require_once('modele.php');

class Commande extends Modele{

  // Renvoie la liste des commandes
  public function getCommandes():PDOStatement {
   
    $sql = 'SELECT id_cde, date_cde, statut_cde, montant, nom_clt '
    .'FROM commande AS t1 INNER JOIN client AS t2'
    . ' ON t1.id_clt = t2.id_clt';
    $commandes = $this->executerRequete($sql);
    return $commandes;
  }

  // Mes Commandes : pour un client en particulier
  public function getMesCommandes($idClt):array {
   
    $sql = 'SELECT id_cde, date_cde, statut_cde, montant, nom_clt '
    .'FROM commande AS t1 INNER JOIN client AS t2'
    . ' ON t1.id_clt = t2.id_clt'
    . ' WHERE t1.id_clt=?';
    $commandes = $this->executerRequete($sql, array($idClt));;
    if ($commandes->rowCount() != 0)
    return $commandes->fetchAll(); 
  else
    throw new Exception("Aucune commande pour ce client");
  }

  // Renvoie les informations pour une commande en particulier
  public function getCommande($idCde):array {// en sortie un array. fetch()
    $sql = 'SELECT id_cde, date_cde, statut_cde, montant, id_clt'
      . 'FROM commande '
      . 'WHERE id_cde=?';
    $commande = $this->executerRequete($sql, array($idCde));
    if ($commande->rowCount() == 1)
      return $commande->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucune commande ne correspond à l'identifiant '$idCde'");
    }

  public function addCommande($montant, $id_clt = null){
    echo "Modele Commande";
    $sql = "INSERT INTO commande (date_cde, statut_cde, montant, id_clt) "
    ."VALUES (NOW(), :statut, :montant, :id_clt)";
    //echo date('m-d-Y', time()); // ne fonctionne en paramètre retourne 00-00-00
    $params=['statut'=>'En cours','montant'=>$montant, 'id_clt'=> $id_clt ];

    $statement = $this->executerRequete($sql, $params);
    //ALTER TABLE commande AUTO_INCREMENT = 1;

    //$last_id = $statement->lastInsertId();
    //echo "LastInsertId : ".$last_id;
  }

  public function deleteCommande($idCde){ // DELETE FROM `commande` WHERE 0
    $sql = "DELETE FROM `commande` WHERE id_cde=?";
    $commande = $this->executerRequete($sql, array($idCde));
    if ($commande->rowCount() == 1)
      return $commande->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucune commande ne correspond à l'identifiant '$idCde'");
  }
  
  }

