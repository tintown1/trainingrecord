<?php include ('connect.php'); 
//สร้างตัวแปร
$EmpID_tbl = $_GET['EmpID_tbl'];
//ลบข้อมูล
$sql = "DELETE FROM employees 
               WHERE EmpID_tbl='$EmpID_tbl' ";
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
		//ปิดการเชื่อมต่อ database
mysqli_close($connect);
	//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'fetch_employeesuser.php';";
	echo "</script>";
		}
else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'fetch_employeesuser.php'; ";
	echo "</script>";
	}
?>