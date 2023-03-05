<?php

require_once 'modele/commande.php';
require_once 'modele/client.php';
require_once 'modele/panier.php';
require_once 'vue/vue.php';

class ControleurCommande {

  private $commande;
  private $client;
  private $panier;

  public function __construct() {
    $this->commande = new Commande();
    $this->client = new Client() ;
    $this->panier = new Panier();
  }

  // Affiche la page d'un instrument ciblé
  public function getCommande($idCommande) {
    $commande = $this->commande->getCommande($idCommande);
    $vue = new Vue("commande");
    $vue->generer(array('commande' => $commande));//$vue->generer()
  }

  public function getCommandes(){
    $commandes = $this->commande->getCommandes();
    $vue = new Vue("listingCommande");
    $vue->generer(array('commandes' => $commandes));
  }

  public function cancelCde($idCde){
    $this->commande->deleteCommande($idCde);
    $this->panier->getPanier();
  }

  public function addCommande($prix, $idClient = null){
    $this->commande->addCommande($prix, $idClient);
    $nomClt = $this->getClient($idClient); // methode de cette classe
    $commandes = $this->commande->getMesCommandes($idClient);
    $vue = new Vue("mesCommandes");
    $vue->generer(array('commandes' => $commandes, 'nomClt' => $nomClt));
  }

  private function getClient($idClient){
    $client = $this->client->getClient($idClient);
    echo "Id_Client : ".$idClient;
    $nomClt = $client['nom_clt'];
    return $nomClt ;
  }
}