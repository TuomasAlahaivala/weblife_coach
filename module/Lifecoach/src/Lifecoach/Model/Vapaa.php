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
 class Vapaa implements InputFilterAwareInterface
 {

     protected $inputFilter;
     public $id_user;
     public $suunnitelmat;
     public $siivous;
     public $sauna;
     public $kauppa;
     public $liikunta;
     public $viihde;
     public $muuta;
     
     public function __construct(){

     }
     public function exchangeArray($data)
     {
        $user_session = new Container('user');
        $this->id_user =   $user_session->id_user;
        $this->suunnitelmat     = (!empty($data['suunnitelmat'])) ? $data['suunnitelmat'] : null;
        $this->siivous    = (!empty($data['siivous'])) ? $data['siivous'] : null;
        $this->sauna     = (!empty($data['sauna'])) ? $data['sauna'] : null;
        $this->kauppa     = (!empty($data['kauppa'])) ? $data['kauppa'] : null;
        $this->liikunta     = (!empty($data['liikunta'])) ? $data['liikunta'] : null;
        $this->viihde     = (!empty($data['viihde'])) ? $data['viihde'] : null;
        $this->muuta     = (!empty($data['muuta'])) ? $data['muuta'] : null;
         

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
                 'name'     => 'suunnitelmat',
                 'required' => true,
             ));

             $inputFilter->add(array(
                 'name'     => 'siivous',
                 'required' => true,
             ));
             
            $inputFilter->add(array(
                 'name'     => 'sauna',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'kauppa',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'liikunta',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'viihde',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'muuta',
                 'required' => true,
             ));
             
             
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }