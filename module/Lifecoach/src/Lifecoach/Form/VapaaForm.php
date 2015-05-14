<?php
namespace Lifecoach\Form;

 use Zend\Form\Form;

 class VapaaForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('vapaa');
         
         
         $this->add(array(
             'name' => 'suunnitelmat',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Suunnitelmat',
             ),
         ));
         $this->add(array(
             'name' => 'siivous',
             'type' => 'Time',
             'options' => array(
                 'label' => 'siivous',
             ),
         ));
         $this->add(array(
             'name' => 'sauna',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Sauna',
             ),
         ));
         $this->add(array(
             'name' => 'kauppa',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Kauppa',
             ),
         ));
         $this->add(array(
             'name' => 'liikunta',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Liikunta',
             ),
         ));
         $this->add(array(
             'name' => 'viihde',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Viihde',
             ),
         ));
         $this->add(array(
             'name' => 'muuta',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Muuta',
             ),
         ));
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Lisää',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }