<?php

/**
 * template_ag 0.0.1
 
 * Features
 * - renders/generate templates
 
 * Usage
   $templates = new templates_ag(array(
    'paths'     => array('/path/to/templates/folder'), 
   ));
   $templates->render('folder/template',array('data'=>'data')); //print
   $templates->get('folder/template',array('data'=>'data')); //returns
 */

class lako_config extends lako_lib_base{
  protected $version = '0.0.1';
  const IS_SINGLETON = false;
  
  public function __construct($config){
    $parsed_config = null;
    // It could be a JSON file
    $parsed_config = is_array($config)? $config: lako::get('ljson')->require_file($config);
    parent::__construct($parsed_config);
  }
  
  /**
    get()     - return whole array of values
    get($key) - return single key’s value
    get(array(path/to/value))  -  finds path to the value and returns (path finding should be done in array helper lib)
    get(mixed, mixed, ...)     - return values combined for all these different queries
   */
  public function get(){
    $arg_list = func_get_args();
    switch(count($arg_list)){
      case 0:
        return $this->config;
        
      case 1:
        if(is_array($arg_list[0]))
          throw new Exception('Path mapping is not yet supported.');
        if(!isset($this->config[$arg_list[0]]))
          throw new Exception('No such key exists.');
        return $this->config[$arg_list[0]];
      
      default:
        $result = array();
        foreach($arg_list as $key){
          $store_index = is_array($key)? implode('/', $key): $key;
          $result[$store_index] = $this->get($key);
        }
        return $result;
    }
  }
  
}