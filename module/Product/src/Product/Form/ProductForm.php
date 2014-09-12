<?php

namespace Product\Form;


use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;
use Product\Form\ProductForm;

class ProductForm extends  Form {
	public function __construct($name = null, $options = array())
	{
		parent::__construct('Product');
	
		$this->setAttribute('method', 'post');
		$this->setInputFilter(new ProductFilter());
		$this->setHydrator(new ClassMethods());
	
		$this->add(array(
				'name' => 'id',
				'type' => 'hidden',
		));
	
		$this->add(array(
				'name' => 'name',
				'type' => 'text',
				'options' => array(
						'label' => 'Product Name',
				),
				'attributes' => array(
						'id' => 'product-name',
						'maxlength' => 100,
				)
		));
		$this->add(array(
				'name' => 'price',
				'type' => 'text',
				'options' => array(
						'label' => 'Product Price',
				),
				'attributes' => array(
						'id' => 'product-price',
						'maxlength' => 100,
				)
		));
		$this->add(array(
				'name' => 'quantity',
				'type' => 'text',
				'options' => array(
						'label' => 'Qunatity',
				),
				'attributes' => array(
						'id' => 'qunatity',
						'maxlength' => 100,
				)
		));
		$this->add(array(
				'name' => 'sku',
				'type' => 'text',
				'options' => array(
						'label' => 'Sku',
				),
				'attributes' => array(
						'id' => 'sku',
						'maxlength' => 100,
				)
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