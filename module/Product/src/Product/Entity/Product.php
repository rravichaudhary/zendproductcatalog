<?php


//namespace Product\Entity;
namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;
/*
use Doctrine\ORM\Mapping;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;  */
 
/** @ORM\Entity */
class Product {
 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
 
    /** @ORM\Column(type="string") */
    protected $name;
 	
    /** @ORM\Column(type="integer") */
    protected $price;
    
    /** @ORM\Column(type="integer") */
    protected $quantity;
    
    /** @ORM\Column(type="integer") */
    
    protected $sku;
    
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
 
    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name) {
        $this->name = $name;
 
        return $this;
    }
    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
    	return $this->name;
    }
    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice() {
    	return $this->price;
    }
    
    /**
     * Set price
     *
     * @param int $price
     * @return Product
     */
    public function setPrice($price) {
    	$this->price = $price;
    	return $this;
    }
    
    /**
     * Get qunatity
     *
     * @return integer
     */
    public function getQuantity() {
    	return $this->quantity;
    }
    
    /**
     * Set qunatity
     *
     * @param integer $quantity
     * @return Product
     */
    public function setQuantity($quantity) {
    	$this->quantity = $quantity;
    	return $this;
    }
    
    /**
     * Get sku
     *
     * @return integer
     */
    public function getSku() {
    	return $this->sku;
    }
    
    /**
     * Set name
     *
     * @param integer $sku
     * @return Product
     */
    public function setSku($sku) {
    	$this->sku = $sku;
    	return $this;
    }
    
 
}