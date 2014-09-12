<?php

namespace Product\Form;


use Zend\InputFilter\InputFilter;
class CategoryFilter extends InputFilter {
	
	public function __construct()
	{
		$this->add(array(
				'name' => 'id',
				'required' => true,
				'filters' => array(
						array('name' => 'Int'),
				),
		));
	
		$this->add(array(
				'name' => 'name',
				'required' => true,
				'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'validators' => array(
						array(
								'name' => 'StringLength',
								'options' => array(
										'encoding' => 'UTF-8',
										'max' => 100
								),
						),
				),
		));
	
		$this->add(array(
				'name' => 'status',
				'required' => false,
		));
	}
}

?>