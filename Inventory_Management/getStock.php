<?php

require_once 'core/init.php';

if(isset($_POST['c_id'])){
	error_reporting(0);
	$se = $_POST['c_id'];

$sups = DB::getInstance()->query("SELECT * FROM inv_supplier WHERE cId = '$se'");
                           
foreach ($sups->results() as $sup) {
           echo "<option value='$sup->sup_Id'>$sup->name</option>";
      
}
}
?>
