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
class User {
 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
 
    /** @ORM\Column(type="string") */
    protected $fullName;
 
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
     * @param string $fullname
     * @return User
     */
    public function setFullname($fullname) {
        $this->fullName = $fullname;
 
        return $this;
    }
 
}