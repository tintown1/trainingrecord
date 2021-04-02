<?php include ('connect.php'); 
//สร้างตัวแปร
$departmentID_tbl = $_REQUEST['departmentID_tbl'];

$sqlCheck = "SELECT Empdepartment_tbl
			FROM employees 
			WHERE Empdepartment_tbl = '$departmentID_tbl'
			AND EmpStatus_tbl = 1 ";
//$result = mysqli_query($connect, $sqlCheck);
$result = $connect->query($sqlCheck);	

	
if ($result->num_rows > 0) {
	$_SESSION['status'] = "ข้อมูลถูกใช้งานอยู่";
 	$_SESSION['status_code'] ="warning";
 	header('Location: fetch_department.php');
}
else {
	$sql = "DELETE FROM department 
	WHERE departmentID_tbl='$departmentID_tbl'";
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
	//ปิดการเชื่อมต่อ database
	if ($connect->query($sql) === TRUE) {
		$_SESSION['status'] = "ข้อมูลได้ถูกลบแล้ว";
		$_SESSION['status_code'] ="success";
		header('Location: fetch_department.php');
	} 
	else {
		echo "Error deleting record: " . $connect->error;
		$_SESSION['status'] = "error";
		$_SESSION['status_code'] ="error";
		header('Location: fetch_department.php');
	}
}

mysqli_close($connect);

?>