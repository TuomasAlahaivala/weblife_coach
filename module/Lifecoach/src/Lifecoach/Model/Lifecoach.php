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
 class Lifecoach implements InputFilterAwareInterface
 {
     public $dataarray;
     protected $inputFilter;
     public $inputarray;
     
     public function __construct($inputarray){
         $this->inputarray = $inputarray;
     }
     public function exchangeArray($data)
     {

         foreach($this->inputarray as $input){
           $this->dataarray->$input =   (!empty($data[$input])) ? $data[$input] : null;
         }

     }
     public function setInputFilter(InputFilterInterface $inputFilter,$inputarray)
     {
         throw new \Exception("Not used");
     }
     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();
             
 
             foreach ($this->inputarray as $input){
                $inputFilter->add(array(
                    'name'     => $input,
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                ));
             }
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }