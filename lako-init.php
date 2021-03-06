<?php

define('LAKO_WP_PATH', dirname(__FILE__));

if(!class_exists('lako')){
  require_once LAKO_WP_PATH.'/lako/lako.php';
  global $wpdb;
  
  lako::init(array(
    'lako_path'     => LAKO_WP_PATH.'/lako',
    'base_path'     => LAKO_WP_PATH.'/lako/base',
    'libs_path'     => LAKO_WP_PATH.'/lako/libs',
    'class_prefix'  => 'lako_',
    'modules_path'  => LAKO_WP_PATH.'/lako/modules',
    
    /**
     * Config data for individual libs
     */
    'objects'  => array(
      'base_path'         => LAKO_WP_PATH.'/lako/libs/objects',
      'definitions_path'  => LAKO_WP_PATH.'/lako/libs/objects/definitions',
      'code_path'         => LAKO_WP_PATH.'/lako/libs/objects/code',
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
      'templates_path' => LAKO_WP_PATH.'/lako/libs/forms/templates',
    ),
  ));
}
