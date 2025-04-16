<?php
include_once("../../functions/userFunctions.php");
$result = empRegistration($_POST['empName'],$_POST['empEmail'],$_POST['empNic'],$_POST['empTel'],$_POST['empDob']);
echo($result);


?>