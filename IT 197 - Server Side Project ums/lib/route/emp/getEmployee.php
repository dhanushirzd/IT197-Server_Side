<?php
include_once("../../functions/db_conn.php");

if(isset($_POST['id'])) {
    $emp_id = $_POST['id'];
    
    $db_conn = Connection();
    $query = "SELECT * FROM emp_tbl WHERE emp_id = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $emp_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo "0";
    }
    
    mysqli_close($db_conn);
} else {
    echo "0";
}
?>