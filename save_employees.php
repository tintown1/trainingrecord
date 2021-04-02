<?php include "connect.php"; ?>
<?php
//print_r($_POST)
$empid = $_POST['EmpID_tbl'];
$EmpFirstName_tbl = $_POST['EmpFirstName_tbl'];
$EmpLastName_tbl = $_POST['EmpLastName_tbl'];
$EmpStartDate_tbl = $_POST['EmpStartDate_tbl'];
$departmentID_tbl = $_POST['departmentID_tbl'];
$level = $_POST['level_name'];
$EmpEmail_tbl = $_POST['EmpEmail_tbl'];
$emp_position = $_POST['p_id'];

$sqlCheck =" SELECT EmpID_tbl FROM employees WHERE EmpID_tbl = '$empid'";
$result2 = mysqli_query($connect, $sqlCheck) or die(mysqli_error());
$num = mysqli_num_rows($result2);
if ($num > 0) {
    $_SESSION['status'] = "รหัสพนักงานซ้ำกรุณากรอกใหม่";
    $_SESSION['status_code'] = "error";
    header('Location: fetch_employees.php');
}
else{
$check = " SELECT  EmpEmail_tbl 
	FROM employees  
	WHERE EmpEmail_tbl = '$EmpEmail_tbl' ";
$EmpPassword_tbl = $_POST['EmpPassword_tbl'];
$result1 = mysqli_query($connect, $check) or die(mysqli_error());
$num = mysqli_num_rows($result1);
if ($num > 0) {
    $_SESSION['status'] = "อีเมลซ้ำ กรุณากรอกใหม่ !";
    $_SESSION['status_code'] = "error";
    header('Location: fetch_employees.php');
} else {

    mysqli_query($connect, "INSERT INTO employees (EmpID_tbl,EmpFirstName_tbl,EmpLastName_tbl,EmpStartDate_tbl,Empdepartment_tbl,EmpEmail_tbl,EmpStatus_tbl,EmpPassword_tbl,EmpLv,EmpPosition_tbl)
                          VALUES('$empid','$EmpFirstName_tbl','$EmpLastName_tbl','$EmpStartDate_tbl','$departmentID_tbl','$EmpEmail_tbl','','$EmpPassword_tbl','$level','$emp_position')");
    if (mysqli_affected_rows($connect) > 0) {
        $_SESSION['status'] = "เพิ่มผู้ใช้งานสำเร็จ";
        $_SESSION['status_code'] = "success";
        header('Location: fetch_employees.php');
    } else {
        $_SESSION['status'] = "เพิ่มผู้ใช้งานไม่สำเร็จ กรุณากรอกใหม่";
        $_SESSION['status_code'] = "warning";
        header('Location: fetch_employees.php');
    }
}
}
?>