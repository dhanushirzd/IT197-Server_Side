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
                <h3>Add Emp Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form id="empRegistrationForm">
                            <div class="form-group mt-2">
                                <input type="text" name="empName" class="form-control" placeholder="Enter Emp Name..." required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="email" name="empEmail" class="form-control" placeholder="Enter Emp Email..." required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" name="empNic" class="form-control" placeholder="Enter Emp Nic..." required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="text" name="empTel" class="form-control" placeholder="Enter Emp Phone..." required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="date" name="empDob" class="form-control" placeholder="Enter Emp DOB..." required>
                            </div>
                            <div class="form-group mt-2">
                                <input type="submit" id="btnSave" name="btnSave" class="btn btn-success" value="Save">
                                <input type="reset" value="Clear" class="btn btn-danger ms-2">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="../../../css/bootstrap/js/bootstrap.js"></script>
    <script>
        //pass the data to rote file
        $('#btnSave').click(function(e){

            $.ajax({
               
                url:"../../route/emp/register.php",
                type: "post",
                data:$("#empRegistrationForm").serialize(),
                success:function(data){
                    if(data == '1'){
                        alert("Success");
                    }else{
                        alert("Error");
                    }
                }
            });
        });
    </script>