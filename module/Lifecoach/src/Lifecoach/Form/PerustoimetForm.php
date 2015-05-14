<?php
namespace Lifecoach\Form;

 use Zend\Form\Form;

 class PerustoimetForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('perustoimet');
         
         $this->add(array(
             'name' => 'uni',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Uni määrä',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick1'
             ),
             
         ));
         $this->add(array(
             'name' => 'aamupala',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Aamupala',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick2'
             ),
             
         ));
         $this->add(array(
             'name' => 'lounas',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Lounas',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick3'
             ),
         ));
         $this->add(array(
             'name' => 'paivallinen',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Päivällinen',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick4'
             ),
         ));
         $this->add(array(
             'name' => 'iltapala',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Iltapala',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick5'
             ),
         ));
         $this->add(array(
             'name' => 'hampaat',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Hampaiden pesu',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick6'
             ),
         ));
         $this->add(array(
             'name' => 'suihku',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Suihku',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick7'
             ),
         ));
         $this->add(array(
             'name' => 'hukka_aika',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Hukka-aika',
             ),
             'attributes' => array(
                 'class' => "timepick",
                 'id' => 'timepick8'
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