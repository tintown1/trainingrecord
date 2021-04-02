<?php include "connect.php"; ?>
<?php
   //print_r($_POST)
   if(isset($_POST['submit'])){

   $EmpID_tbl =$_POST{'EmpID_tbl'};
   $EmpFirstName_tbl =$_POST{'EmpFirstName_tbl'};
   $EmpLastName_tbl =$_POST{'EmpLastName_tbl'};
   $EmpStartDate_tbl =$_POST{'EmpStartDate_tbl'};
   $departmentID_tbl =$_POST{'departmentID_tbl'};
   $EmpEmail_tbl =$_POST{'EmpEmail_tbl'};
   $EmpPassword_tbl =$_POST{'EmpPassword_tbl'};
   

   $sql = " UPDATE employees 
             SET    EmpFirstName_tbl = '$EmpFirstName_tbl',
             EmpLastName_tbl ='$EmpLastName_tbl',
             EmpStartDate_tbl ='$EmpStartDate_tbl',
             Empdepartment_tbl ='$departmentID_tbl',
             EmpEmail_tbl ='$EmpEmail_tbl',
             EmpPassword_tbl ='$EmpPassword_tbl'
             
		     WHERE  EmpID_tbl = '$EmpID_tbl' ";
	
	$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());


   //ปิดการเชื่อมต่อ database
   mysqli_close($connect);
   //ถ้าสำเร็จให้ขึ้นอะไร
   if ($result){
      $_SESSION['status'] = "บันทึกข้อมูลสำเร็จ";
      $_SESSION['status_code'] ="success";
      header('Location: edit_employeesuser.php');
   }
   else {
   //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
   $_SESSION['status'] = "บันทึกข้อมูลไม่สำเร็จ";
       $_SESSION['status_code'] ="error";
       header('Location: fetch_training_user.php');
   }
}
   ?>

