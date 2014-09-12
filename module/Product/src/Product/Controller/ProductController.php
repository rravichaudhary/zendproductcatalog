<?php

namespace Product\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Entity\User;
use Product\Form\ProductForm;
use Product\Entity\Product;


class ProductController extends AbstractActionController {
	
	public function indexAction(){
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
 			$product = new \Product\Entity\Product();
			 $productData = $objectManager->getRepository('Product\Entity\Product')->findAll();
		    return  array('product' => $productData);
	}
	
	
	public function editAction(){
		
	}
	
	
	public function deleteAction(){
		
	}
	
	public function addAction(){
		$form = new ProductForm();
		$product = new Product();
		$form->bind($product);
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setData($request->getPost());
			if ($form->isValid()) {
		
				$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
				$objectManager->persist($product);
				$objectManager->flush();
				// Redirect to list of tasks
				return $this->redirect()->toRoute('product');
			}
		}
		return array('form' => $form);
	}
	
}



?>
