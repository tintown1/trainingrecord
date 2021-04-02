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
                
                $startdate = "";//ฟิว 2
                if(isset($Row[1])) {
                    $startdate = mysqli_real_escape_string($connect,$Row[1]);
                }//ฟิว 2

                $enddate = "";//ฟิว 3
                if(isset($Row[2])) {
                    $enddate = mysqli_real_escape_string($connect,$Row[2]);
                }//ฟิว 3

                $course = "";//ฟิว 3
                if(isset($Row[3])) {
                    $course = mysqli_real_escape_string($connect,$Row[3]);
                }//ฟิว 3

                $category = "";//ฟิว 4
                if(isset($Row[4])) {
                    $category = mysqli_real_escape_string($connect,$Row[4]);
                }//ฟิว 4

                $certificate = "";//ฟิว 4
                if(isset($Row[5])) {
                    $certificate = mysqli_real_escape_string($connect,$Row[5]);
                }//ฟิว 4

                $location = "";//ฟิว 4
                if(isset($Row[6])) {
                    $location = mysqli_real_escape_string($connect,$Row[6]);
                }//ฟิว 4




                
                if (!empty($empid) ||  
                    !empty($startdate) || 
                    !empty($enddate) || 
                    !empty($course) ||
                    !empty($category) ||
                    !empty($certificate) ||
                    !empty($location)){
                    

                    $query = "insert into trainingtbl
                              (trainingEmpID_tbl,trainingStartDate_tbl,trainingEndDate_tbl,trainingCourse_tbl,trainingCategory_tbl,trainingCertificate_tbl,location_tbl) 
                              values('".$empid."',
                                     '".$startdate."',
                                     '".$enddate."',
                                     '".$course."',
                                     '".$category."',
                                     '".$certificate."',
                                     '".$location."')";
                    $result = mysqli_query($connect, $query);
                  

                
                    if (! empty($result)) {
                        // $_SESSION['status'] = "บันทึกข้อมูลสำเร็จ";
                        // $_SESSION['status_code'] ="success";
                        // header('Location: importcsv.php');
                        $_SESSION['status'] = "บันทึก CSV สำเร็จ";
	                    $_SESSION['status_code'] ="success";
                        header("Location: fetch_training_user.php?EmpID_tbl" .$empid."");
                    //   echo"window.location ='fetch_training.php?EmpID_tbl=' .$empid.";"";
                  
                    
                  
                       

                    } else {
                        // $type = "error";
                        // $message = "Problem in Importing Excel Data";
                        // echo "<script>";
                        // echo"alert('error Problem in Importing Excel Data');";
                        // echo"window.location ='fetch_training_user.php';";
                        // echo "</script>";
                    }
                }
             }
        
         }
  }
  else
  { 
        // $type = "error";
        // $message = "Invalid File Type. Upload Excel File.";
        // echo "<script>";
        // echo"alert('error Invalid File Type. Upload Excel File.');";
        // echo"window.location ='fetch_training_user.php';";
        // echo "</script>";
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