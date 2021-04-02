<?php include ('connect.php'); 
//สร้างตัวแปร
$CategoryID_tbl = $_REQUEST['CategoryID_tbl'];

$sqlCheck = "SELECT trainingCategory_tbl
			FROM trainingtbl 
			WHERE trainingCategory_tbl = '$CategoryID_tbl'";
			$result = $connect->query($sqlCheck);	
//ลบข้อมูล
if ($result->num_rows > 0) {
	$_SESSION['status'] = "ข้อมูลถูกใช้งานอยู่";
 	$_SESSION['status_code'] ="warning";
 	header('Location: fetch_category.php');
}
else {
$sql = "DELETE FROM category 
               WHERE CategoryID_tbl='$CategoryID_tbl' ";
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
		//ปิดการเชื่อมต่อ database
mysqli_close($connect);
	//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
	$_SESSION['status'] = "ข้อมูลได้ถูกลบแล้ว";
	$_SESSION['status_code'] ="success";
	header('Location: fetch_category.php');
		}
else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
	$_SESSION['status'] = "ผิดพลาด";
	$_SESSION['status_code'] ="error";
	header('Location: fetch_category.php');
	}
}
?>

