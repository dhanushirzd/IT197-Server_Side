<?php
include_once("../../functions/userFunctions.php");
$result= deleteUser($_POST['id']);
echo($result);

?>