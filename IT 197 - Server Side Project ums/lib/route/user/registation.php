<?php

include_once('../../functions/userFunctions.php');

$result = userRegistation($_POST['userName'], $_POST['userEmail'], $_POST['userPass'], $_POST['userPhone'], $_POST['userNic']);

echo($result);

?>