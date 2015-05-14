<?php
namespace Lifecoach\Form;

 use Zend\Form\Form;

 class TyotehtavatForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('tyotehtavat');

         $this->add(array(
             'name' => 'tyotehtava',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Työtehtava',
             ),
         ));
         $this->add(array(
             'name' => 'tyoaika',
             'type' => 'Password',
             'options' => array(
                 'label' => 'Arvioitu työaika',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }