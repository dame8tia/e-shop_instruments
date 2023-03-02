<?php

/**
 * Class Panier : Permet de stocker les instruments ajoutés au panier dans la variable $_coockie de php
 * Plus tard, il faudra valider le panier pour en faire une commande.
 */
class Panier extends Modele  {
    
    private $items = array();
    private $cookieName = "panier";
    
    public function __construct() {
        if(isset($_COOKIE[$this->cookieName])) {
            $this->items = unserialize($_COOKIE[$this->cookieName]);
        }
    }
    
    public function addInstrument($idInstr, $qtite) {
        if(isset($this->items[$idInstr])) {
            $this->items[$idInstr] += $qtite;
        } else {
            $this->items[$idInstr] = $qtite;
        }
        $this->savePanier();
    }

    public function reduceQtity($idInstr, $qtite) {
        if(isset($this->items[$idInstr])) {
            if($qtite > 1){
                $this->items[$idInstr] -= $qtite;
            }
            elseif ($qtite == 1){
                $this->delInstrument($idInstr);
            }            
        } else {
            $this->items[$idInstr] = $qtite;
        }
        $this->savePanier();
    }
    
    public function delInstrument($idInstr) {
        unset($this->items[$idInstr]);
        $this->savePanier();
    }
    
    public function clearPanier() {
        $this->items = array();
        $this->savePanier();
    }
    
    public function getPanier() {
        return $this->items;
    }
    
    private function savePanier() {
        setcookie($this->cookieName, serialize($this->items), time() + (86400 * 30), "/");
    }
}