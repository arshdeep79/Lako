
<?php

/**
 * Loads files given paths
 */

class lako_data_provider extends lako_lib_base{
  protected $version      = '0.0.1';
  const     IS_SINGLETON  = true;
  protected $_data_providers_finder =  null;
  
  public function __construct($config = array()){
    lako::import('config_factory');
    lako::import('loader');
    
    //set up data provider finder service
    $this->_data_providers_finder = array(
      'system'  => new lako_config_factory(),
      'coded'   => new lako_loader()
    );
    
    $this->_data_providers_finder['system']->add_path(CMF_PATH.'/system/data-providers');
    $this->_data_providers_finder['coded']->add_path(CMF_PATH.'/data-providers');
  }
  
  public function get($provider_name){
    //prefer the coded version
    $coded_version = $this->_data_providers_finder['coded']->locate($provider_name.'.php');
    if($coded_version){
      require_once $coded_version;
      
      return $this->fill_stub(call_user_func("{$provider_name}_data_provider"));
    }
    throw new Exception("data provider with name {$provider_name} not found.");
  }
  
  public function stub(){
    return array(
      'data' => null
    );
  }
  
  public function fill_stub($data){
    $stub = $this->stub();
    $stub['data'] = $data;
    return $stub;
  }
 
}