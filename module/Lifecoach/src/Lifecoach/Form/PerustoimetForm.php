<?php
namespace Users\Form;

 use Zend\Form\Form;

 class PerustoimetForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('perustoimet');
         
         $this->add(array(
             'name' => 'id_user',
             'type' => 'Hidden',
         ));
         
         $this->add(array(
             'name' => 'uni',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Uni määrä',
             ),
         ));
         $this->add(array(
             'name' => 'aamupala',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Aamupala',
             ),
         ));
         $this->add(array(
             'name' => 'lounas',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Lounas',
             ),
         ));
         $this->add(array(
             'name' => 'paivallinen',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Päivällinen',
             ),
         ));
         $this->add(array(
             'name' => 'iltapala',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Iltapala',
             ),
         ));
         $this->add(array(
             'name' => 'hampaat',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Hampaiden pesu',
             ),
         ));
         $this->add(array(
             'name' => 'suihku',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Suihku',
             ),
         ));
         $this->add(array(
             'name' => 'hukka_aika',
             'type' => 'Time',
             'options' => array(
                 'label' => 'Hukka-aika',
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