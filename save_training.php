<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd");	
	$numrand = (mt_rand());
   $empID = $_POST['EmpID_tbl'];
   $startdate =$_POST['trainingStartDate_tbl'];
   $enddate =$_POST['trainingEndDate_tbl'];
   $course =$_POST['trainingCourse_tbl'];
   $category =$_POST['CategoryName_tbl'];
   $certificate = $_POST['trainingCertificate_tbl'];
   $locationtbl =$_POST['location_tbl'];
   $file = $_FILES['trainingPDF_tbl'];

if(isset($_POST["trainingPDF_tbl"]))
$allow = array('pdf');
$temp=explode(".",$_FILES['trainingPDF_tbl']['name']);
$ext=end($temp);
$upload_file=$_FILES['trainingPDF_tbl']['name'];
move_uploaded_file($_FILES['trainingPDF_tbl']['tmp_name'],"upload/".$_FILES['trainingPDF_tbl']['name']);


   // $path = "upload/";

   // $ext = strrchr($_FILES['trainingPDF_tbl']['name'],".");
   // $new_image_name = $date1.$numrand.$ext;
   // $path_copy = $path.$new_image_name;
   // $image_path = "upload/".$new_image_name;
   // move_uploaded_file($_FILES['trainingPDF_tbl']['tmp_name'], $path_copy);
    $sql = " INSERT INTO trainingtbl
    (trainingEmpID_tbl,trainingStartDate_tbl,trainingEndDate_tbl,trainingCourse_tbl,trainingCategory_tbl,trainingCertificate_tbl,trainingPDF_tbl,location_tbl)
                          VALUES
 ('$empID','$startdate','$enddate','$course','$category','$certificate','$upload_file','$locationtbl')";


    $result = mysqli_query($connect, $sql) or die (mysqli_error($connect)."<br>$sql");
    mysqli_close($connect);
    if ($result){
		
		echo"<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลสำร็จ');";
	    echo "window.location = 'fetch_training.php';";
		echo "</script>";
		
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
			
		echo"<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลไม่สำเร็จ');";
		echo  "window.location = 'insert_training.php';";
		echo	"</script>";
			
		}
   
	
?>
