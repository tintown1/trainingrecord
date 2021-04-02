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
          
                $departname = "";//ฟิว 1
                if(isset($Row[0])) {
                    $departname = mysqli_real_escape_string($connect,$Row[0]);
                }//ฟิว 1
                
               




                
                if (!empty($departname))   
                    {
                    

                    $query = "INSERT into department
                              (departmentName_tbl) 
                              values('".$departname."')";
                    $result = mysqli_query($connect, $query);
                

                
                    if (! empty($result)) {
                    //   $type = "success";
                    //   $message = "Excel Data Imported into the Database";
                      $_SESSION['status'] = "บันทึก CSV สำเร็จ";
	                  $_SESSION['status_code'] ="success";
                     
                    //   echo"window.location ='fetch_training.php?EmpID_tbl=' .$empid.";"";
                  
                    
                     header("Location: fetch_department.php");
                        
                    

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