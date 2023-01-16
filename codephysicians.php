<?php
session_start();
include('db_conn.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $Attending_Physician_Name = $row['0'];
                $Tel = $row['1'];
                $InstituteID = $row['2'];
                $SpecialityID = $row['3'];

                $physicianQuery = "INSERT INTO attendingphysicians (Attending_Physician_Name,Tel,InstituteID,SpecialityID) VALUES ('$Attending_Physician_Name','$Tel','$InstituteID','$SpecialityID')";
                $result = mysqli_query($conn, $physicianQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
           $_SESSION['message'] = "Successfully Imported";
            header('Location: excel.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: excel.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: excel.php');
        exit(0);
    }
}
?>