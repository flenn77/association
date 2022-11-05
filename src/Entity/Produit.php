<?php
namespace App\Entity;

class Produit 
{

    /**
     * Id du Produit
     * Il doit être PRIMARY KEY NOT NULL
     *
     * @var integer
     */
    private int $id;

    /**
     * Libellé (nom) du Produit
     *
     * @var string
     */
    private string $libelleProduit;

    /**
     * Marque de fabrication du Produit
     *
     * @var string
     */
    private string $marqueProduit;

    /**
     * Quantité en stock du Produit
     *
     * @var integer
     */
    private int $quantiteProduit;

    /**
     * Description du Produit
     *
     * @var string
     */
    private string $descriptionProduit;

    /**
     * Prix (en €) du Produit
     *
     * @var integer
     */
    private int $prixProduit;

    /**
     * Image du Produit
     *
     * @var string
     */
    private string $imageProduit;


    /*************************************************************************************** */


    /**
     * Get il doit être PRIMARY KEY NOT NULL
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get libellé (nom) du Produit
     *
     * @return  string
     */ 
    public function getLibelleProduit()
    {
        return $this->libelleProduit;
    }

    /**
     * Set libellé (nom) du Produit
     *
     * @param  string  $libelleProduit  Libellé (nom) du Produit
     *
     * @return  self
     */ 
    public function setLibelleProduit(string $libelleProduit)
    {
        $this->libelleProduit = $libelleProduit;

        return $this;
    }

    /**
     * Get marque de fabrication du Produit
     *
     * @return  string
     */ 
    public function getMarqueProduit()
    {
        return $this->marqueProduit;
    }

    /**
     * Set marque de fabrication du Produit
     *
     * @param  string  $marqueProduit  Marque de fabrication du Produit
     *
     * @return  self
     */ 
    public function setMarqueProduit(string $marqueProduit)
    {
        $this->marqueProduit = $marqueProduit;

        return $this;
    }

    /**
     * Get quantité en stock du Produit
     *
     * @return  integer
     */ 
    public function getQuantiteProduit()
    {
        return $this->quantiteProduit;
    }

    /**
     * Set quantité en stock du Produit
     *
     * @param  integer  $quantiteProduit  Quantité en stock du Produit
     *
     * @return  self
     */ 
    public function setQuantiteProduit($quantiteProduit)
    {
        $this->quantiteProduit = $quantiteProduit;

        return $this;
    }

    /**
     * Get description du Produit
     *
     * @return  string
     */ 
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * Set description du Produit
     *
     * @param  string  $descriptionProduit  Description du Produit
     *
     * @return  self
     */ 
    public function setDescriptionProduit(string $descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    /**
     * Get prix (en €) du Produit
     *
     * @return  integer
     */ 
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * Set prix (en €) du Produit
     *
     * @param  integer  $prixProduit  Prix (en €) du Produit
     *
     * @return  self
     */ 
    public function setPrixProduit($prixProduit)
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    /**
     * Get image du Produit
     *
     * @return  string
     */ 
    public function getImageProduit()
    {
        return $this->imageProduit;
    }

    /**
     * Set image du Produit
     *
     * @param  string  $imageProduit  Image du Produit
     *
     * @return  self
     */ 
    public function setImageProduit(string $imageProduit)
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }
}