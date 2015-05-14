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
class PerustoimetTable
 {
     protected $tableGateway;

     public function __construct($sm)
     {
        
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Perustoimet());
        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
        $this->tableGateway = new TableGateway("lifecoach_perustoimet", $dbAdapter, null, $resultSetPrototype);
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function checkPerusinfo($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_user' => $id));
         $row = $rowset->current();
         
         return $row;
     }

     public function saveData(Perustoimet $Lifecoach)
     {

         $data = array(
             'id_user' => $Lifecoach->id_user,
             'uni' => $Lifecoach->uni,
             'aamupala'  => $Lifecoach->aamupala,
             'lounas'  => $Lifecoach->lounas,
             'paivallinen'  => $Lifecoach->paivallinen,
             'iltapala'  => $Lifecoach->iltapala,
             'hampaat'  => $Lifecoach->hampaat,
             'suihku'  => $Lifecoach->suihku,
             'hukka_aika'  => $Lifecoach->hukka_aika,
         );

             $this->tableGateway->insert($data);
         
     }

     public function deleteUser($id)
     {
         $this->tableGateway->delete(array('id_user' => (int) $id));
     }
 }