<?php

define('LAKO_PATH' , realpath('../lako'));
define('CMF_PATH' , dirname(__FILE__));
require_once LAKO_PATH.'/lako.php';

lako::init(array(
  'lako_path'     => LAKO_PATH,
  'base_path'     => LAKO_PATH.'/base',
  'libs_path'     => LAKO_PATH.'/libs',
  'class_prefix'  => 'lako_',
  'modules_path'  => LAKO_PATH.'/modules',
    
  /**
   * Config data for individual libs
   */
  'objects'  => array(
    'base_path'         => LAKO_PATH.'/lako/libs/objects',
    'definitions_path'  => LAKO_PATH.'/lako/libs/objects/definitions',
    'code_path'         => LAKO_PATH.'/lako/libs/objects/code',
    'object_suffix'     => '_object_lako',
    'table_prefix'      => 'pre_',
    'table_suffix'      => '',
  ),
  
  'database'  => array(
    'username' => 'DB_USER',
    'password' => 'DB_PASSWORD',
    'database' => 'DB_NAME',
    'host'     => 'DB_HOST',
  ),
  
  'forms'  => array(
    'templates_path' => LAKO_PATH.'/lako/libs/forms/templates',
  ),
));

lako::add_modules_path(CMF_PATH.'/lako-modules');
lako::add_modules_path(CMF_PATH.'/system/lako-modules');
lako::get('cmf')->render();


