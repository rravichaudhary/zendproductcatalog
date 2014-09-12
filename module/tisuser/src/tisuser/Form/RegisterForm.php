<?php

namespace tisuser\Form; 

use Zend\Captcha; 
use Zend\Form\Element; 
use Zend\Form\Form; 

class RegistrationForm extends Form 

{ 
    public function __construct($name = null) 
    { 
        parent::__construct('tisuser'); 
        
        $this->setAttribute('method', 'post'); 
        
        $this->add(array( 
            'name' => 'username', 
            'type' => 'Zend\Form\Element\Text', 
            'attributes' => array( 
                'placeholder' => 'Enter Username...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'User Name', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'password', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Password Here...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'cpassword', 
            'type' => 'Zend\Form\Element\Password', 
            'attributes' => array( 
                'placeholder' => 'Confirm Password Here...', 
                'required' => 'required', 
            ), 
            'options' => array( 
                'label' => 'Confirm Password', 
            ), 
        )); 
 
        $this->add(array( 
            'name' => 'csrf', 
            'type' => 'Zend\Form\Element\Csrf', 
        ));    
	$this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));


    } 
} 
