<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
if(isset($_POST['submit'])){
   $EmpID_tbl =$_POST['EmpID_tbl'];
   $EmpFirstName_tbl =$_POST['EmpFirstName_tbl'];
   $EmpLastName_tbl =$_POST['EmpLastName_tbl'];
   $EmpStartDate_tbl =$_POST['EmpStartDate_tbl'];
   $departmentID_tbl =$_POST['departmentID_tbl'];
   $EmpEmail_tbl =$_POST['EmpEmail_tbl'];
   $EmpPassword_tbl =$_POST['EmpPassword_tbl'];
   $Emplevel = $_POST['level_name'];
   $Empposition = $_POST['p_id'];

  $sql = " UPDATE employees 
             SET  
             
             EmpFirstName_tbl = '$EmpFirstName_tbl',
             EmpLastName_tbl ='$EmpLastName_tbl',
             EmpStartDate_tbl ='$EmpStartDate_tbl',
             Empdepartment_tbl ='$departmentID_tbl',
             EmpEmail_tbl ='$EmpEmail_tbl',
             EmpPassword_tbl ='$EmpPassword_tbl',
             EmpLv = '$Emplevel',
             EmpPosition_tbl ='$Empposition'
             WHERE EmpID_tbl = '$EmpID_tbl'";
	
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error($sql));


   //ปิดการเชื่อมต่อ database
  
   //ถ้าสำเร็จให้ขึ้นอะไร
if ($connect->query($sql) === TRUE){
      $_SESSION['status'] = "อัพเดทข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
     header("Location: fetch_employees.php");
     echo $EmpID_tbl;
   // echo"window.location = 'fetch_employees.php?bp_id=$EmpID_tbl';";
  
}
else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   echo "<script type='text/javascript'>";
   echo "alert('error!');";
   echo"window.location = 'fetch_employees.php'; ";
   echo"</script>";
}
}
mysqli_close($connect);
   ?>

