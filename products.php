<?php

 class Products{
    private $id;
    private $name;
    private $old_price;
    private $new_price;
    private $image;
    private $stock;
    private $country;
    private $city;
    private $nbachat;
    private $category;

    public function __construct($id,$name,$old_price,$new_price,$image,$stock,$country,$city,$nbachat,$category) {
        $this->id = $id;
        $this->name = $name;
        $this->old_price = $old_price;
        $this->new_price = $new_price;
        $this->image = $image;
        $this->stock = $stock;
        $this->country = $country;
        $this->city = $city;
        $this->nbachat = $nbachat;
        $this->category = $category;
        
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of old_price
     */ 
    public function getold_price()
    {
        return $this->old_price;
    }

    /**
     * Get the value of new_price
     */ 
    public function getnew_price()
    {
        return $this->new_price;
    }

    /**
     * Get the value of image
     */ 
    public function getimage()
    {
        return $this->image;
    }

    /**
     * Get the value of stock
     */ 
    public function getstock()
    {
        return $this->stock;
    }

    /**
     * Get the value of country
     */ 
    public function getcountry()
    {
        return $this->country;
    }

    /**
     * Get the value of city
     */ 
    public function getcity()
    {
        return $this->city;
    }

    /**
     * Get the value of nbachat
     */ 
    public function getnbachat()
    {
        return $this->nbachat;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

?>