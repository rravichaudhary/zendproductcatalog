<?php

namespace Product\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;
use Product\Form\CategoryFilter;

class CategoryForm extends  Form {
	public function __construct($name = null, $options = array())
	{
		parent::__construct('Category');
	
		$this->setAttribute('method', 'post');
		$this->setInputFilter(new CategoryFilter());
		$this->setHydrator(new ClassMethods());
	
		$this->add(array(
				'name' => 'id',
				'type' => 'hidden',
		));
	
		$this->add(array(
				'name' => 'name',
				'type' => 'text',
				'options' => array(
						'label' => 'Category Name',
				),
				'attributes' => array(
						'id' => 'categroy',
						'maxlength' => 100,
				)
		));
	
		$this->add(array(
				'name' => 'status',
				'type' => 'checkbox',
				'options' => array(
						'label' => 'Completed?',
						'label_attributes' => array('class'=>'checkbox'),
				),
		));
	
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Save',
						'class' => 'btn btn-primary',
				),
		));
	}
	
}

?>