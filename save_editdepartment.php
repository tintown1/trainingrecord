<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   $departmentID_tbl =$_POST{'departmentID_tbl'};
   $departmentName_tbl =$_POST{'departmentName_tbl'};
   

   $sql = " UPDATE department 
             SET    departmentName_tbl = '$departmentName_tbl'
		     WHERE  departmentID_tbl = '$departmentID_tbl' ";
	
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());


   //ปิดการเชื่อมต่อ database
   mysqli_close($connect);
   //ถ้าสำเร็จให้ขึ้นอะไร
   if ($result){
      $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
      header("Location: fetch_department.php");
   }
   else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   echo "<script type='text/javascript'>";
   echo "alert('error!');";
   echo"window.location = 'fetch_department.php'; ";
   echo"</script>";
   }
   ?>