<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lifecoach\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Lifecoach\Model\Lifecoach;
class VapaaTable
 {
     protected $tableGateway;

     public function __construct($sm)
     {
        
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Lifecoach());
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $this->tableGateway = new TableGateway("vapaa", $dbAdapter, null, $resultSetPrototype);
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

         $data = array(
             'id_user' => $Lifecoach->id_user,
             'suunnitelmat' => $Lifecoach->suunnitelmat,
             'siivous'  => $Lifecoach->siivous,
             'sauna'  => $Lifecoach->sauna,
             'kauppa'  => $Lifecoach->kauppa,
             'liikunta'  => $Lifecoach->liikunta,
             'viihde'  => $Lifecoach->viihde,
             'muuta'  => $Lifecoach->muuta,
         );
             $this->tableGateway->insert($data);
         
     }

     public function deleteUser($id)
     {
         $this->tableGateway->delete(array('id_user' => (int) $id));
     }
 }