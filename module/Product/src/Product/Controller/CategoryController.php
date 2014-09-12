<?php

namespace Product\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Entity\Category;
use Product\Form\CategoryForm;


class CategoryController extends AbstractActionController {
	
	public function indexAction(){
			$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
 			$category = new Category();
			 $categoryData = $objectManager->getRepository('Product\Entity\Category')->findAll();
		    return  array('category' => $categoryData);
	}
	
	
	public function editAction(){
		$id = $this->params('id', 0);
		
	}
	
	
	public function deleteAction(){
		
	}
	
	public function addAction(){
		$form = new CategoryForm();
		$category = new Category();
		$form->bind($category);
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setData($request->getPost());
			if ($form->isValid()) {
				//$this->getTaskMapper()->saveTask($task);
				$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
				$objectManager->persist($category);
				$objectManager->flush();
				// Redirect to list of tasks
				return $this->redirect()->toRoute('category');
			}
		}
		return array('form' => $form);
	}
	
}



?>
