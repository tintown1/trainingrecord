<?php
include('connect.php');

require_once('php-excel-reader/excel_reader2.php');
require_once('SpreadsheetReader.php');
if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'csvuploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $empid = "";//ฟิว 1
                if(isset($Row[0])) {
                    $empid = mysqli_real_escape_string($connect,$Row[0]);
                }//ฟิว 1
                $empname = "";//ฟิว 1
                if(isset($Row[1])) {
                    $empname = mysqli_real_escape_string($connect,$Row[1]);
                }//ฟิว 1
                $emplast = "";//ฟิว 1
                if(isset($Row[2])) {
                    $emplast = mysqli_real_escape_string($connect,$Row[2]);
                }//ฟิว 1
                $startdate = "";//ฟิว 1
                if(isset($Row[3])) {
                    $startdate = mysqli_real_escape_string($connect,$Row[3]);
                }//ฟิว 1
                $department = "";//ฟิว 1
                if(isset($Row[4])) {
                    $department = mysqli_real_escape_string($connect,$Row[4]);
                }//ฟิว 1
                $email = "";//ฟิว 1
                if(isset($Row[5])) {
                    $email = mysqli_real_escape_string($connect,$Row[5]);
                }//ฟิว 1
                $status = "";//ฟิว 1
                if(isset($Row[6])) {
                    $status = mysqli_real_escape_string($connect,$Row[6]);
                }//ฟิว 1
                $pass = "";//ฟิว 1
                if(isset($Row[7])) {
                    $pass = mysqli_real_escape_string($connect,$Row[7]);
                }//ฟิว 1
                $level = "";//ฟิว 1
                if(isset($Row[8])) {
                    $level = mysqli_real_escape_string($connect,$Row[8]);
                }//ฟิว 1
                $position = "";//ฟิว 1
                if(isset($Row[9])) {
                    $position = mysqli_real_escape_string($connect,$Row[9]);
                }//ฟิว 1
               




                
                if (!empty($empid) ||  
                !empty($empname) || 
                !empty($emplast) || 
                !empty($startdate) ||
                !empty($department) ||
                !empty($email) ||
                !empty($status) ||
                !empty($pass) ||
                !empty($level) ||
                !empty($position)){
                    

                    $query = "INSERT into employees
                              (EmpID_tbl,EmpFirstName_tbl,EmpLastName_tbl,EmpStartDate_tbl,EmpDepartment_tbl,EmpEmail_tbl,EmpStatus_tbl,EmpPassword_tbl,EmpLv,EmpPosition_tbl) 
                              values('".$empid."',
                              '".$empname."',
                              '".$emplast."',
                              '".$startdate."',
                              '".$department."',
                              '".$email."',
                              '".$status."',
                              '".$pass."',
                              '".$level."',
                              '".$position."')";
                    $result = mysqli_query($connect, $query);
                

                
                    if (! empty($result)) {
                    //   $type = "success";
                    //   $message = "Excel Data Imported into the Database";
                      $_SESSION['status'] = "บันทึก CSV สำเร็จ";
	                  $_SESSION['status_code'] ="success";
                     
                    //   echo"window.location ='fetch_training.php?EmpID_tbl=' .$empid.";"";
                  
                    
                     header("Location: fetch_employees.php");
                        
                    

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        echo "<script>";
                        echo"alert('error Problem in Importing Excel Data');";
                        echo"window.location ='fetch_training.php';";
                        echo "</script>";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        echo "<script>";
        echo"alert('error Invalid File Type. Upload Excel File.');";
        echo"window.location ='importcsvadmin.php';";
        echo "</script>";
  }
}
?>

 
</body>
<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
</html>