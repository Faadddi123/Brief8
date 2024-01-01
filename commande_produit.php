<?php

 class ProCommande{
    private $idcom;
    private $idproduit;
    private $quantite;
    private $prix_unitaire;
    private $prix_total;

    public function __construct($idcom, $idproduit, $quantite, $prix_unitaire, $prix_total) {
        $this->idcom = $idcom;
        $this->idproduit = $idproduit;
        $this->quantite = $quantite;
        $this->prix_unitaire = $prix_unitaire;
        $this->prix_total = $prix_total;
    }

    /**
     * Get the value of idcom
     */ 
    public function getIdcom()
    {
        return $this->idcom;
    }


    /**
     * Get the value of idproduit
     */ 
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Get the value of prix_unitaire
     */ 
    public function getPrix_unitaire()
    {
        return $this->prix_unitaire;
    }

    /**
     * Get the value of prix_total
     */ 
    public function getPrix_total()
    {
        return $this->prix_total;
    }
}

?>