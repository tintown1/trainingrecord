<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   $CategoryID_tbl =$_POST['CategoryID_tbl'];
   $CategoryName_tbl =$_POST['CategoryName_tbl'];
   

   $sql = " UPDATE category 
             SET    CategoryName_tbl = '$CategoryName_tbl'
		     WHERE  CategoryID_tbl = '$CategoryID_tbl' ";
	
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());


   //ปิดการเชื่อมต่อ database
   mysqli_close($connect);
   //ถ้าสำเร็จให้ขึ้นอะไร
   if ($result){
      $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
      header('Location: fetch_category.php?');
   
   }
   else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   echo "<script type='text/javascript'>";
   echo "alert('error!');";
   echo"window.location = 'fetch_category.php'; ";
   echo"</script>";
   }
   ?>