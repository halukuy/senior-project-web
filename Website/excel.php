<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Coordinators</h4>
                  
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                            <a href="home.php" type="submit" name="go_database" class="btn btn-primary mt-3" style="float: right;">See database</a>

                        </form>
 <form method="post" action="export.php">
                            <button type="submit" name="export" class="btn btn-primary mt-3">Export</button>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="card">
                    <div class="card-header">
                        <h4>Courses</h4>
                  
                    <div class="card-body">

                        <form action="codecourses.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>
 <form method="post" action="courseexport.php">
                            <button type="submit" name="export" class="btn btn-primary mt-3">Export</button>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
                    <div class="card-header">
                        <h4>Diagnostics</h4>
                  
                    <div class="card-body">

                        <form action="codediagnostics.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>
 <form method="post" action="exportdiagnostics.php">
                            <button type="submit" name="export" class="btn btn-primary mt-3">Export</button>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
                    <div class="card-header">
                        <h4>Physicians</h4>
                  
                    <div class="card-body">

                        <form action="codephysicians.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>
 <form method="post" action="exportphysicians.php">
                            <button type="submit" name="export" class="btn btn-primary mt-3">Export</button>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

