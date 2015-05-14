<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Lifecoach\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Session\Container;
 class Tyotehtavat implements InputFilterAwareInterface
 {

     protected $inputFilter;
     public $id_user;
     public $tyotehtavat;
     public $tyoaika;
     
     public function __construct($inputarray = null){

     }
     public function exchangeArray($data)
     {

        $user_session = new Container('user');
        $this->id_user =   $user_session->id_user;
        $this->tyotehtavat     = (!empty($data['tyotehtavat'])) ? $data['tyotehtavat'] : null;
        $this->tyoaika    = (!empty($data['tyoaika'])) ? $data['tyoaika'] : null;
         

     }
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }
     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();


             $inputFilter->add(array(
                 'name'     => 'tyotehtavat',
                 'required' => true,
             ));

             $inputFilter->add(array(
                 'name'     => 'tyoaika',
                 'required' => true,
             ));
             
             
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }