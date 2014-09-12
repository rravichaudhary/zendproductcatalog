<?php


//namespace Product\Entity;
namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;
use Product\Entity\Product;
use Product\Entity\Category;
/*
use Doctrine\ORM\Mapping;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;  */
 
/** @ORM\Entity */
class ProductCategory {
 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
 
    /** @ORM\Column(type="integer") 
   
     **/
    protected $productId;
    
    /** @ORM\Column(type="integer")
   
     **/
    protected $categoryId;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
 
    /**
     * Set fullname
     *
     * @param string $productID
     * @return ProductCategory
     */
    public function setProductId($productID) {
        $this->productId = $productID;
		 return $this;
    }
    
    /**
     * Set fullname
     *
     * @param string $productID
     * @return ProductCategory
     */
    public function setCategoryId($categoryId) {
    	$this->categoryId = $categoryId;
    	return $this;
    }
 
}