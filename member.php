<?php  
include('connect.php');

  $ID = $_SESSION['EmpID_tbl'];
  $name = $_SESSION['EmpFirstName_tbl'];
  $level = $_SESSION['EmpLv'];
  $status = $_SESSION['EmpStatus_tbl'];
 	if($level!='Member'){
    Header("Location: ../logout.php");  
  }  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
">
</head>
<body>
<?php include "home_member.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js
"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js
"></script>
ิ<br>
<br>

	<form action="logout.php">
	<h1 align = 'center'>Member Page</h1>
	<h3 align = 'center'> สวัสดี คุณ <?php echo $name; ?> สถานะ <?php echo $level; ?> รหัสพนักงาน <?php echo $ID;?></h3>
	<p align = 'center'><button type="button" class="btn btn-outline-danger"><input type="submit" value="ออกจากระบบ"></button></p>
	</form>
</body>
</html>