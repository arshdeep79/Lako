<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once '../lako-init.php';
$json = lako::get('json');


$d = $json->require_file('json-files/file.json'); 
?>
<h3> <?='$json->require_file(\'json-files/file.json\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $json->require_string('{"test":"test"}'); 
?>
<h3> <?='$json->require_string(\'{"test":"test"}\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $json->save('json-files/file-save.json' , array('test'=>'test')); 
?>
<h3> <?='$json->save(\'json-files/file-save.json\' , array(\'test\'=>\'test\'))'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />

