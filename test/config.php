<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once '../lako-init.php';
lako::import('config');
$config = new lako_config('json-files/file');

$d = $config->get(); 
?>
<h3> <?='$config->get()'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $config->get('key1'); 
?>
<h3> <?='$config->get(\'key1\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $config->get('key1','key2'); 
?>
<h3> <?='$config->get(\'key1\',\'key2\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />

