<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   $p_id =$_POST{'p_id'};
   $p_name =$_POST{'p_name'};
   

   $sql = " UPDATE position 
             SET    p_name = '$p_name'
		     WHERE  p_id = '$p_id' ";
	
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());


   //ปิดการเชื่อมต่อ database
   mysqli_close($connect);
   //ถ้าสำเร็จให้ขึ้นอะไร
   if ($result){
      $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
      header("Location: fetch_position.php");
   }
   else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   echo "<script type='text/javascript'>";
   echo "alert('error!');";
   echo"window.location = 'fetch_department.php'; ";
   echo"</script>";
   }
   ?>