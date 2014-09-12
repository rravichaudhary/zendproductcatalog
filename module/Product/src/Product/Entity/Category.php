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
class Category {
 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
 
    /** @ORM\Column(type="string") */
    protected $name;
 	
    /** @ORM\Column(type="boolean") */
    protected $status;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Get id
     *
     * @return string
     */
    public function getName() {
    	return $this->name;
    }
 
    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;
 
        return $this;
    }
    
    /**
     * Get id
     *
     * @return boolean
     */
    public function getStatus() {
    	return $this->status;
    }
    
    /**
     * Set name
     *
     * @param boolean $status
     * @return Category
     */
    public function setStatus($status) {
    	$this->status = $status;
    
    	return $this;
    }
 
}