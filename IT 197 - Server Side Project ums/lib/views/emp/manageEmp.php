<?php
include_once("../../functions/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Emp Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card mt-3">
              <div class="card-header">
                <h3>Manage Emp Details</h3>
              </div>
            <div class="card-body">
            <div class="row">

            <div class="col-md-12">
                <table class="table table-hover table-dark table-bordered">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>NIC</th>
                          <th>Phone</th>
                          <th>DOB</th>
                          <th>Delete</th>
                          <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $db_conn=Connection();
                          $query= "SELECT* FROM emp_tbl ";
                          $query_run = mysqli_query($db_conn, $query);
                          $nor= mysqli_num_rows($query_run);
                          while($row=mysqli_fetch_array($query_run)){
                         ?>

                          <tr>
                               <td><?php echo $row['emp_id'] ?></td>
                               <td><?php echo $row['emp_name']?></td>
                               <td><?php echo $row['emp_email'] ?></td>
                               <td><?php echo $row['emp_nic'] ?></td>
                               <td><?php echo $row['emp_tel'] ?></td>
                               <td><?php echo $row['emp_dob']?></td>
                               <td>
                                  <button class="btn btn-danger deleteBtn" id="<?php echo($row['emp_id']) ?>">Delete</button>
                               </td>
                               <td>
                                  <button class="btn btn-warning editBtn" id="<?php echo($row['emp_id']) ?>">Edit</button>
                               </td>
                          </tr>
                        <?php
                          }
                        ?>
                    </tbody>
                </table>
                
            </div>
            </div>    
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editEmpForm">
          <input type="hidden" id="edit_emp_id" name="emp_id">
          <div class="mb-3">
            <label for="edit_emp_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit_emp_name" name="emp_name">
          </div>
          <div class="mb-3">
            <label for="edit_emp_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="edit_emp_email" name="emp_email">
          </div>
          <div class="mb-3">
            <label for="edit_emp_nic" class="form-label">NIC</label>
            <input type="text" class="form-control" id="edit_emp_nic" name="emp_nic">
          </div>
          <div class="mb-3">
            <label for="edit_emp_tel" class="form-label">Phone</label>
            <input type="text" class="form-control" id="edit_emp_tel" name="emp_tel">
          </div>
          <div class="mb-3">
            <label for="edit_emp_dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="edit_emp_dob" name="emp_dob">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateEmpBtn">Save Changes</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script src="../../../css/bootstrap/js/bootstrap.js"></script>


<script>
    $(document).ready(function(){
        // Existing delete functionality
        $(".deleteBtn").click(function(){
            var del = $(this).attr("id");
            $.ajax({
                method: "POST",
                url: "../../route/emp/deleteUser.php",
                data: {id: del},
                dataType: "html",
                success: function(data){
                    if(data == 1){
                        alert("Success user data has been deleted");
                        location.reload();
                    } else {
                        alert("Please Try Again");
                    }
                }
            });
        });

        // New edit functionality
        $(".editBtn").click(function(){
            var emp_id = $(this).attr("id");
            
            // Get employee data
            $.ajax({
                method: "POST",
                url: "../../route/emp/getEmployee.php",
                data: {id: emp_id},
                dataType: "json",
                success: function(data){
                    // Populate modal with employee data
                    $("#edit_emp_id").val(data.emp_id);
                    $("#edit_emp_name").val(data.emp_name);
                    $("#edit_emp_email").val(data.emp_email);
                    $("#edit_emp_nic").val(data.emp_nic);
                    $("#edit_emp_tel").val(data.emp_tel);
                    $("#edit_emp_dob").val(data.emp_dob);
                    
                    // Show the modal
                    $("#editModal").modal("show");
                },
                error: function(){
                    alert("Error retrieving employee data");
                }
            });
        });

        // Handle update button click
        $("#updateEmpBtn").click(function(){
            // Get form data
            var formData = {
                emp_id: $("#edit_emp_id").val(),
                emp_name: $("#edit_emp_name").val(),
                emp_email: $("#edit_emp_email").val(),
                emp_nic: $("#edit_emp_nic").val(),
                emp_tel: $("#edit_emp_tel").val(),
                emp_dob: $("#edit_emp_dob").val()
            };
            
            // Update employee data
            $.ajax({
                method: "POST",
                url: "../../route/emp/updateEmployee.php",
                data: formData,
                dataType: "html",
                success: function(data){
                    if(data == 1){
                        alert("Employee data updated successfully");
                        $("#editModal").modal("hide");
                        location.reload();
                    } else {
                        alert("Failed to update employee data");
                    }
                },
                error: function(){
                    alert("Error updating employee data");
                }
            });
        });
    });
</script>