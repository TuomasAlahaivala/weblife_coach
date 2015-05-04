<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
     'controllers' => array(
         'invokables' => array(
             'Lifecoach\Controller\Lifecoach' => 'Lifecoach\Controller\LifecoachController',
         ),
     ),
    'router' => array(
         'routes' => array(
             'lifecoach' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/lifecoach[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Lifecoach\Controller\Lifecoach',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'lifecoach' => __DIR__ . '/../view',
         ),
     ),
 );