<?php 
require_once( dirname(__FILE__) . '/mysql.php' );
$db=new MySQL(array
('host'=>'localhost', 'user'=>'root', 'password'=>'rootski', 'database'=>'volreportcard'));


define("VOLCARD", "volreportcard");

?>