# Lako Documentation 

* [Installation](#installation)
* [Modules and Libs](#modules-and-libs)
  * [Creating a lako library from scratch](#creating-a-lako-library-from-scratch)
  * [Creating a lako Module](#creating-a-lako-module)
  * [Using a library](#using-a-library)
* Database
  * Creating Objects
  * Reading
  * Writing
  * Updating
  * Deleting
  
  
## Installation

Lako needs some very basic configuration.


Here is a typical configuration code taken from wordpress.

```php
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
```

## Modules and Libs

A Lako Library is essentially a php class with its name prefixed with 'lako_' . There are some more rules to make a normal php class file a lako library. But we will get to those in a bit. 

A lako module is just a directory on disk with bunch of libraries. It is to structure the code better and allow Lako to auto load libraries on demand.


### Creating a lako library from scratch

First clearly define what your library will do. Tip: Treat you library as an API for a specific feature. Split into multiple libraries when needed and make a module of it.

```php

// config.php

/*
  A configuration library.
  It will manage configuration.
*/

// Name of library prefixed with lako_ extends lako_lib_base
class lako_config extends lako_lib_base{
  protected $version = '0.0.1';   // set version of library
  const IS_SINGLETON = false;     // Whether its can be used as a singleton
  
  // its good paractice to make your construct accept $config variable. 
  public function __construct($config = array()){
    parent::__construct($parsed_config);
  }
  
  public function read(){
    return array('Hello!' => 'World');
  }
}

```


### Creating a lako Module

Create a directory structure like this on your disk.

![Alt text](http://i.imgur.com/4Kj3FEM.png)

Put your library files under lib folder. Use lako's 'add_modules_path'. This will enable lako to autoload your libraries on demand.

```php
lako::add_modules_path('/path/to/modules');
```
e-commerce is one the module, the directory 'modules' can hold any number of modules.



### Using a library

To use a library you have to get an instance or in some cases create an instance yourself. First let us see how lako handles the singleton instances.

```php

//getting a singleton instance for a library
$config = lako::get('config');

//Use its API/functions
$config_data = $config->read();

//or use chaining and type less
$config_data = lako::get('config')->read();

```
Lako will automatically search all the modules for the given library then it will create an instance of it and return it to the caller. Lako will never recreate instance if its already present. So do not worry about using chaining or try to cache the returned instance.


Now let's see how lako will deal with non singleton libraries. The core templates library is one example of non singleton library.

```php

//import a library
lako::import('config');

//Create instance
$config_instance = new lako_config(array('My'=>'config'));
$config_data = $config_instance->read();

```
import is similar to require once. But its smart in way that it finds library by itself. The code above should be pretty easy to understand.












