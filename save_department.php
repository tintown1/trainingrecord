<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   $departmentName_tbl =$_POST['departmentName_tbl'];
  

   mysqli_query($connect,"INSERT INTO department (departmentName_tbl)
                          VALUES('$departmentName_tbl')");
    if (mysqli_affected_rows($connect) > 0 ){

		
        $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      	$_SESSION['status_code'] ="success";
      	header("Location: fetch_department.php");
		
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
			
		echo"<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลไม่สำเร็จ');";
		echo  "window.location = 'insert_department.php';";
		echo	"</script>";
			
		}
   
?>