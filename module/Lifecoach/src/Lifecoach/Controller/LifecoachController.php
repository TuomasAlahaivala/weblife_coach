<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lifecoach\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Lifecoach\Model\Perustoimet;
use Lifecoach\Model\PerustoimetTable;
use Lifecoach\Form\PerustoimetForm;
use Lifecoach\Form\TyotehtavatForm;
use Lifecoach\Form\VapaaForm;
use Zend\Session\Container;
 class LifecoachController extends AbstractActionController
 {

     public function indexAction()
     {
        //Tässä tarkistetaan onko käyttäjä kirjautunut sisään sekä onko hän täyttänyt perustiedot
         //Jos ok menee yhteenvetoon
        $user_session = new Container('user');
        $values = array();
        $values['get'] = "";
         /*if(!isset($user_session->user_name)){
             return $this->redirect()->toRoute('users');
         }*/
         if(isset($user_session->user_name)){
        $perustoimettable = new PerustoimetTable($this->getServiceLocator());
        $perusinfo = $perustoimettable->checkPerusinfo($user_session->id_user);
        if($perusinfo != ""){
            $values['perusinfo'] = "Muuta perustietoja";
        }else{
            $values['perusinfo'] = "Lisää perustoimet";
        }

         if($_GET){
             
             $values['get'] = "Perustoimet lisätty";
         }
         }
         return new ViewModel(array(
            'values' => $values,
            'user_session' => $user_session
         ));
     }
     public function insertperustoimetAction()
     {
        
        $form = new PerustoimetForm();
        $user_session = new Container('user');
        $perustoimettable = new PerustoimetTable($this->getServiceLocator());
        $perusinfo = $perustoimettable->checkPerusinfo($user_session->id_user);
        if($perusinfo != ""){
            $form->get('submit')->setValue('Muokkaa');
            $form->bind($perusinfo);
        }
         $request = $this->getRequest();
         if ($request->isPost()) {
             $lifecoach = new Perustoimet();

             $form->setInputFilter($lifecoach->getInputFilter());
             $form->setData($request->getPost());
             
             if ($form->isValid()) {
                 
                 $lifecoach->exchangeArray($form->getData());
                 $perustoimettable = new PerustoimetTable($this->getServiceLocator());
                 $perustoimettable->saveData($lifecoach);

                 return $this->redirect()->toRoute('lifecoach',
                    array('controller'=>'Lifecoach',
                          'action' => 'index',
                          'params' =>'addPerus'));
             }
         }
         return array('form' => $form);
     }
     public function inserttyotehtavatAction(){
         
     }
     public function insertvaraaAction(){
         
     }
     
 }