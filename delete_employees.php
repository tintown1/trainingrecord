<?php include ('connect.php'); 
//สร้างตัวแปร
$EmpID_tbl = $_REQUEST['EmpID_tbl'];
//ลบข้อมูล
$sqlCheck = "SELECT EmpID_tbl 
			FROM employees
			WHERE EmpID_tbl = '$EmpID_tbl'
			AND EmpStatus_tbl = 1";
				
$result = $connect->query($sqlCheck);	

	
if ($result->num_rows > 0) {
	echo $result->num_rows;
	$_SESSION['status'] = "ยืนยันสถานะอยู่ ไม่สามารถลบได้";
	$_SESSION['status_code'] ="warning";
	header('Location: fetch_employees.php');
}
else{
	$sql = "DELETE FROM employees 
			WHERE EmpID_tbl='$EmpID_tbl' ";
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
		//ปิดการเชื่อมต่อ database

	//ถ้าสำเร็จให้ขึ้นอะไร
if ($connect->query($sql) === TRUE){
	$_SESSION['status'] = "ข้อมูลได้ถูกลบแล้ว";
	$_SESSION['status_code'] ="success";
	header('Location: fetch_employees.php');
		}
else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'fetch_employees.php'; ";
	echo "</script>";
	}

}

mysqli_close($connect);

?>