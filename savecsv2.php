<?php

	// include database connectivity 

    include_once('connect.php');

    // Import file in php

    if (isset($_POST['import'])) {
    	
    	$fileName = $_FILES["file"]["tmp_name"];

    	if ($_FILES['file']['size'] > 0) {

    		$file = fopen($fileName, "r");

            while (($importData = fgetcsv($file, 10000, ",")) !== FALSE) {

                $empid = "";
                if (isset($importData[0])) {
                    $empid = mysqli_real_escape_string($connect, $importData[0]);
                }
                $start = "";
                if (isset($importData[1])) {
                    $start = mysqli_real_escape_string($connect, $importData[1]);
                }
                $end = "";
                if (isset($importData[2])) {
                    $end = mysqli_real_escape_string($connect, $importData[2]);
                }
                $course = "";
                if (isset($importData[3])) {
                    $course = mysqli_real_escape_string($connect, $importData[3]);
                }
                $category = "";
                if (isset($importData[4])) {
                    $category = mysqli_real_escape_string($connect, $importData[4]);
                }
                $certificate = "";
                if (isset($importData[5])) {
                    $certificate = mysqli_real_escape_string($connect, $importData[5]);
                }
                $location = "";
                if (isset($importData[6])) {
                    $location = mysqli_real_escape_string($connect, $importData[6]);
                }

                $query = "INSERT INTO trainingtbl (trainingEmpID_tbl, trainingStartDate_tbl, trainingEndDate_tbl,
                 trainingCourse_tbl, trainingCategory_tbl,trainingCertificate_tbl,location_tbl) 
                VALUES('".$empid."','".$start."','".$end."','".$course."','".$category."','".$certificate."','".$location."')";
                
                $result = mysqli_query($connect, $query);

                if (!isset($result)) {
                    echo "<script type=\"text/javascript\">
                              alert(\"Invalid File:Please Upload CSV File.\");
                              window.location = \"fetch_training_user.php\"
                          </script>";
                }else{
                    echo "<script type=\"text/javascript\">
                              alert(\"CSV File has been successfully Imported.\");
                              window.location = \"fetch_training_user.php\"
                          </script>";
                }
            }
            fclose($file);
        }
    }