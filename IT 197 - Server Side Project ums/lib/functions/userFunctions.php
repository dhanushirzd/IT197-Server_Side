<?php

//include database connection
include_once("db_conn.php");

//create user user Registation function
function userRegistation($userName,$userEmail,$userPass,$userPhone,$userNic){
    //create database connection
    $db_conn = Connection();
    //data insetrt query
    $insertsql = "INSERT INTO user_tbl (user_name,user_email,user_phone,user_nic,user_status)
    VALUES ('$userName','$userEmail','$userPhone','$userNic',1)";

    $sqlResult = mysqli_query($db_conn,$insertsql);

    //check database connection errors
    if(!$sqlResult){
        echo mysqli_error($db_conn);  // Changed from mysqli_connect_error()
    }

    //if the registration result is success we can feed data into the login table also
    if($sqlResult > 0){
        //use MD5 method to our password
        $newPassword = md5($userPass);

        $insertLogin = "INSERT INTO login_tbl(login_email,login_pwd,login_role,login_status)
        VALUES('$userEmail','$newPassword','user',1)";
        
        

        $loginResult = mysqli_query($db_conn,$insertLogin);

            //check database connection errors
            if(!$loginResult){
                echo mysqli_error($db_conn);  // Changed from mysqli_connect_errno()
            }
            
    return("Your registartion success!!!");

    }else{
        return("Please Try Again!!");
    }
}


//login function
function Authentication($userName, $userPass) {
    $db_conn = Connection();
    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email = '$userName'";
    $sqlResult = mysqli_query($db_conn, $sqlFetchUser);

    // Check for database connection errors
    if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
        return "Database connection error";
    }

    // Convert user password into hash value
    $newpass = md5($userPass);

    // Check if the query returned any results
    if (mysqli_num_rows($sqlResult) > 0) {
        // Fetch the user record
        $rec = mysqli_fetch_assoc($sqlResult);

        // Validate the password
        if ($rec['login_pwd'] == $newpass) {
            // Validate the user login status
            if ($rec['login_status'] == 1) {
                if ($rec['login_role'] == "admin") {
                    // Redirect the user to the admin dashboard
                    header('location:lib/views/dashboards/admin.php');
                } else {
                    // Redirect the user to the user dashboard
                    header('location:lib/views/dashboards/user.php');
                }
            } else {
                return "Your account has been deactivated";
            }
        } else {
            return "Your password is not correct. Please try again.";
        }
    } else {
        return "No records found";
    }
}

function empRegistration($empName,$empEmail,$empNic,$empTel,$empDob){
    $db_conn = Connection();

$insert = "INSERT INTO emp_tbl(emp_name,emp_email,emp_nic,emp_tel,emp_dob)
    VALUES ('$empName','$empEmail','$empNic','$empTel','$empDob');";

$result = mysqli_query($db_conn,$insert);
if($result>0){
    return 1;
}else{
    return 0;
    
}
}
   function deleteUser($id){
    $db_conn=Connection();
    $query="DELETE FROM emp_tbl WHERE emp_id='$id'";
    $queryResult= mysqli_query($db_conn,$query);
    if($queryResult>0){
        return 1;
    }else{
        return 0;
    }    
   }
?>