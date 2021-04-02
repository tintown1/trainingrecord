<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
  
   date_default_timezone_set('Asia/Bangkok');
	$date1 = date("Ymd");	
	$numrand = (mt_rand());
   if(isset($_POST['submit']))
   {
   $training_id =$_POST['trainingID_tbl'];
   $trainingStartDate_tbl =$_POST['trainingStartDate_tbl'];
   $trainingEndDate_tbl =$_POST['trainingEndDate_tbl'];
   $course =$_POST['trainingCourse_tbl'];
   $category =$_POST['CategoryID_tbl'];
   $certificate = $_POST['trainingCertificate_tbl'];
   $locationtbl =$_POST['location_tbl'];
   $file = $_FILES['trainingPDF_tbl'];
   $path = "upload/";
   if(isset($_POST["trainingPDF_tbl"]))
$allow = array('pdf');
$temp=explode(".",$_FILES['trainingPDF_tbl']['name']);
$ext=end($temp);
$upload_file=$_FILES['trainingPDF_tbl']['name'];
move_uploaded_file($_FILES['trainingPDF_tbl']['tmp_name'],"upload/".$_FILES['trainingPDF_tbl']['name']);
   
//    $ext = strrchr($_FILES['trainingPDF_tbl']['name'],".");
//    $new_image_name = $date1.$numrand.$ext;
//    $path_copy = $path.$new_image_name;
//    $image_path = "upload/".$new_image_name;
//    move_uploaded_file($_FILES['trainingPDF_tbl']['tmp_name'], $path_copy);


   $sql = " UPDATE trainingtbl 
             SET    
             trainingStartDate_tbl ='$trainingStartDate_tbl',
             trainingEndDate_tbl ='$trainingEndDate_tbl',
             trainingCourse_tbl ='$course',
             trainingCategory_tbl ='$category',
             trainingCertificate_tbl = '$certificate',
             trainingPDF_tbl = '$upload_file',
             location_tbl = '$locationtbl'
		     WHERE  trainingID_tbl = '$training_id' ";
	
	$result = mysqli_query($connect, $sql) or die (mysqli_error($connect)."<br>$sql");


   //ปิดการเชื่อมต่อ database
   mysqli_close($connect);
   //ถ้าสำเร็จให้ขึ้นอะไร
   if ($result){
      $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
      header('Location: fetch_training_user.php');
   }
   else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   $_SESSION['status'] = "อัพเดทข้อมูลไม่สำเร็จ";
   $_SESSION['status_code'] ="error";
   header('Location: fetch_training_user.php');
   }
}
   ?>
