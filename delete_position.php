<?php include ('connect.php'); 
//สร้างตัวแปร
$p_id = $_REQUEST['p_id'];
$sqlCheck = "SELECT EmpPosition_tbl
			 FROM employees
			 WHERE EmpPosition_tbl = '$p_id'
			 AND EmpStatus_tbl = 1 ";
$result = $connect->query($sqlCheck);	
	
if ($result->num_rows > 0) {
	$_SESSION['status'] = "ข้อมูลถูกใช้งานอยู่";
 	$_SESSION['status_code'] ="warning";
 	header('Location: fetch_position.php');
}
else{
	$sql = "DELETE FROM position 
               WHERE p_id ='$p_id' ";
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
		//ปิดการเชื่อมต่อ database

	//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
	$_SESSION['status'] = "ข้อมูลได้ถูกลบแล้ว";
	$_SESSION['status_code'] ="success";
	header('Location: fetch_position.php');
		}
else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'fetch_position.php'; ";
	echo "</script>";
	}
}
mysqli_close($connect);
?>