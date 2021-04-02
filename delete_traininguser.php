<?php include ('connect.php'); 
//สร้างตัวแปร

 $trainingID_tbl = $_REQUEST['trainingID_tbl'];
//ลบข้อมูล

	
$sql = "DELETE FROM trainingtbl 
               WHERE trainingID_tbl='$trainingID_tbl' ";
 $result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
		//ปิดการเชื่อมต่อ database
mysqli_close($connect);
	//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
	$_SESSION['status'] = "ข้อมูลได้ถูกลบแล้ว";
	$_SESSION['status_code'] ="success";
	header('Location: fetch_training_user.php');


	}
else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
	echo "<script type='text/javascript'>";
	echo "alert('error!');";
	echo "window.location = 'fetch_training_user.php'; ";
	echo "</script>";
	}

// echo $_REQUEST['trainingID_tbl'];
// echo ($_POST['trainingID_tbl']);
// // {
?>
