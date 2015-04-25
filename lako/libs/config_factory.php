<?php

/**
 *  Handles database interaction
 */
 
class lako_config_factory extends lako_lib_base{
  protected $version = '0.0.1';
  const IS_SINGLETON = true;
  public $loader = null;
  protected $collection = null;
  
  function __construct($config = array()){
    parent::__construct($config);
    lako::import('loader');
    lako::import('ljson');
    $this->loader = new lako_loader();
  }
  
  function get($in_conf){
    $file = lako_ljosn::make_ljson_file($in_file_path);
    $file = $this->loader->locate($file);
    if(!$file)
      throw new Exeption('Not able to find configuration file '. $file .'for ');
    echo "<pre>";
    print_r($file);
    exit;
  }
  
  
  public function make_ljson_file($in_path){
    $ext = strtolower((String)pathinfo($in_path, PATHINFO_EXTENSION));
    if($ext != 'ljson')
      return $in_path.'.ljson';
    return $in_path;
  }
  
  function add_path($path){
    return $this->loader->add_path($path);
  }
}