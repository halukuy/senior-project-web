<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body 
.table table-bordered{
display:none;
}

</style>

    <script>
         function display(val){
var el = document.getElementsByClassName("table table-bordered");
for(i=0; i<el.length; i++) {
   el[i].style.display = "none";
  }
  document.getElementById(val).style.display = "block";
}
</script>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card mt-5">
                    <div class="card-header">
                       <select onchange = "display(this.value)">
<option value='Coordinators' selected>Coordinators</option>
<option value='courses'>Courses</option>
<option value='diagnostics'>Diagnostics</option>
<option value='physicians'>Physicians</option>

</select>
                    </div>
                    <div class="card-body">
                        
                        <table class="table table-bordered" id="Coordinators">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>user name</th>
                                    <th>password</th>
                                    <th>name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 


                                    $query = "SELECT * FROM coordinators";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['user_name']; ?></td>
                                                <td><?= $row['password']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                     <a href="logout.php" class="btn btn-primary mt-3">Logout</a>
                                          <a  href="excel.php" class="btn btn-primary mt-3" style="float: right;"> Import Excel</a>

<table class="table table-bordered" id="courses" style="display:none;">
                            <thead>
                                <tr>
                                    <th>SpecialtyID</th>
                                    <th>Description</th>
                                    <th>Course</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php 


                                    $query = "SELECT * FROM courses";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['SpecialtyID']; ?></td>
                                                <td><?= $row['Description']; ?></td>
                                                <td><?= $row['Course']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
<table class="table table-bordered" id="diagnostics" style="display:none;">
                            <thead>
                                <tr>
                                    <th>SpecialtyID</th>
                                    <th>DiagnosisID</th>
                                    <th>DiagnosisName</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php 


                                    $query = "SELECT * FROM diagnostics";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['ID']; ?></td>
                                                <td><?= $row['specialtyID']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                <table class="table table-bordered" id="physicians" style="display:none;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                
                                    <th>InstituteID</th>
                                    <th>SpecialityID</th>
                            <th>Tel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 


                                    $query = "SELECT * FROM attendingphysicians";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['surname']; ?></td>
                                                <td><?= $row['instituteID']; ?></td>
                                                 <td><?= $row['specialityID']; ?></td>
                                                                                                  <td><?= $row['phone']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
