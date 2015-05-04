<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lifecoach\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Lifecoach\Model\Lifecoach;
use Lifecoach\Form\PerustoimetForm;
use Lifecoach\Form\TyotehtavatForm;
use Lifecoach\Form\VapaaForm;
use Zend\Session\Container;
 class LifecoachController extends AbstractActionController
 {
     public $inputarray;
     public function indexAction()
     {
        //Tässä tarkistetaan onko käyttäjä kirjautunut sisään sekä onko hän täyttänyt perustiedot
         //Jos ok menee yhteenvetoon
         $user_session = new Container('user');
         
         /*if(!isset($user_session->user_name)){
             return $this->redirect()->toRoute('users');
         }*/
         
         return new ViewModel(array(
             'error' => "erorr",
             'user_session' => $user_session
         ));
     }
     public function insert_perustoimetAction()
     {
        $sm = $this->getServiceLocator();
        $this->alue =  $sm->get('Lifecoachperustoimet');
       
        $form = new PerustoimetForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $lifecoach = new Lifecoach($this->inputarray);

             $form->setInputFilter($lifecoach->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $lifecoach->exchangeArray($form->getData());
                 $perustoimettable = new LifecoachTable('lifecoach_perustoimet');
                 $perustoimettable->saveData($lifecoach);

                 return $this->redirect()->toRoute('lifecoach');
             }
         }
         return array('form' => $form);
     }
     public function insert_tyotehtavatAction(){
         
     }
     public function insert_varaaAction(){
         
     }
 }