<?php

// Modèle pour l'entité Instrument

require_once('modele.php');

class Instrument extends Modele{

  // Renvoie la liste des instruments 
  public function getInstruments():PDOStatement {
   
    $sql = 'SELECT id_inst, nom_inst , fabricant_inst, ref_fabricant_inst'
      . ',descript_inst, prix_inst, nb_stock_inst, img_inst, type_cat, t1.id_cat '
      . 'FROM instrument AS t1 JOIN categorie AS t2 '
      . 'WHERE t1.id_cat = t2.id_cat';
    $instruments = $this->executerRequete($sql);
    return $instruments;
  }

  // Renvoie les informations pour un instrument en particulier
  public function getInstrument(int $idInstr):array {// en sortie un array. fetch()
    $sql = 'SELECT id_inst, nom_inst , fabricant_inst, ref_fabricant_inst'
      . ', descript_inst , prix_inst, img_inst, nb_stock_inst, type_cat, t1.id_cat '
      . 'FROM instrument AS t1 JOIN categorie AS t2 '
      . 'WHERE t1.id_cat = t2.id_cat '
      . 'AND id_inst=?';
    $instrument = $this->executerRequete($sql, array($idInstr));
    if ($instrument->rowCount() == 1)
      return $instrument->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun instrumentne correspond à l'identifiant '$idInstr'");
    }
}

