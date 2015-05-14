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
 class Perustoimet implements InputFilterAwareInterface
 {

     protected $inputFilter;
     public $id_user;
     public $uni;
     public $aamupala;
     public $lounas;
     public $paivallinen;
     public $iltapala;
     public $hampaat;
     public $suihku;
     public $hukka_aika;
     
     public function exchangeArray($data)
     {

        $user_session = new Container('user');
        $this->id_user =   $user_session->id_user;
        $this->uni     = (!empty($data['uni'])) ? $data['uni'] : null;
        $this->aamupala    = (!empty($data['aamupala'])) ? $data['aamupala'] : null;
        $this->lounas     = (!empty($data['lounas'])) ? $data['lounas'] : null;
        $this->paivallinen     = (!empty($data['paivallinen'])) ? $data['paivallinen'] : null;
        $this->iltapala     = (!empty($data['iltapala'])) ? $data['iltapala'] : null;
        $this->hampaat     = (!empty($data['hampaat'])) ? $data['hampaat'] : null;
        $this->suihku     = (!empty($data['suihku'])) ? $data['suihku'] : null;
        $this->hukka_aika     = (!empty($data['hukka_aika'])) ? $data['hukka_aika'] : null;
         
     }
     public function getArrayCopy()
     {
         return get_object_vars($this);
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
                 'name'     => 'uni',
                 'required' => true,
             ));

             $inputFilter->add(array(
                 'name'     => 'aamupala',
                 'required' => true,
             ));
             
            $inputFilter->add(array(
                 'name'     => 'lounas',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'paivallinen',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'iltapala',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'hampaat',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'suihku',
                 'required' => true,
             ));
            $inputFilter->add(array(
                 'name'     => 'hukka_aika',
                 'required' => true,
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }