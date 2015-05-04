<?php

namespace Lifecoach;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;
 
 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Lifecoachperustoimet' => function(){
                    $inputsarrayperus = array('uni','aamupala','lounas','paivallinen','iltapala','hampaat','suihku','hukka_aika');
                    return $inputsarrayperus;
                 },
                    'Lifecoachtyotehtavat' => function(){
                    $inputsarraytyo = array('tyotehtava','tyoaika');
                    return $inputsarraytyo;
                 },
                    'Lifecoachvapaa' => function(){
                    $inputsarrayvapaa = array('suunnitelmat','siivous','sauna','kauppa','liikunta','viihde','muuta');
                    return $inputsarrayvapaa;
                 },
             ),
         );
     }
 }