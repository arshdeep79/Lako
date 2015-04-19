<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once '../lako-init.php';
$ljson = lako::get('ljson');

$d = $ljson->require_file('json-files/file'); 
?>
<h3> <?='$ljson->require_file(\'json-files/file.json\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $ljson->require_string('{"test":"test"}'); 
?>
<h3> <?='$ljson->require_string(\'{"test":"test"}\')'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />
<?php
$d = $ljson->save('json-files/file-save.json' , array('test'=>'test')); 
?>
<h3> <?='$ljson->save(\'json-files/file-save\' , array(\'test\'=>\'test\'))'; ?> </h3>
<pre>
<? print_r($d); ?>
</pre>
<hr />

