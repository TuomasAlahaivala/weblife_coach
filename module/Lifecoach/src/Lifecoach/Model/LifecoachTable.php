<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Users\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Lifecoach\Model\Lifecoach;
class Lifecoach
 {
     protected $tableGateway;
     public $inputarray;


     public function __construct($table)
     {
         $this->inputarray = $inputarray;
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Lifecoach());
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $this->tableGateway = new TableGateway($table, $dbAdapter, null, $resultSetPrototype);
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getData($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_user' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveData(Lifecoach $Lifecoach)
     {
         foreach($this->inputarray as $input){
             $data[$input] = $Lifecoach->$input;
         }

         $id = (int) $Lifecoach->id_user;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getData($id)) {
                 $this->tableGateway->update($data, array('id_user' => $id));
             } else {
                 throw new \Exception('User id does not exist');
             }
         }
     }

     public function deleteUser($id)
     {
         $this->tableGateway->delete(array('id_user' => (int) $id));
     }
 }