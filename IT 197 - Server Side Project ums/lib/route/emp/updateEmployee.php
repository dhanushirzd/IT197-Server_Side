<?php
include_once("../../functions/db_conn.php");

if(isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_nic = $_POST['emp_nic'];
    $emp_tel = $_POST['emp_tel'];
    $emp_dob = $_POST['emp_dob'];
    
    $db_conn = Connection();
    $query = "UPDATE emp_tbl SET emp_name = ?, emp_email = ?, emp_nic = ?, emp_tel = ?, emp_dob = ? WHERE emp_id = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $emp_name, $emp_email, $emp_nic, $emp_tel, $emp_dob, $emp_id);
    
    if(mysqli_stmt_execute($stmt)) {
        echo "1";
    } else {
        echo "0";
    }
    
    mysqli_close($db_conn);
} else {
    echo "0";
}
?>