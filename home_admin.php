<?php 


  $ID = $_SESSION['EmpID_tbl'];
  $name = $_SESSION['EmpFirstName_tbl'];
  $level = $_SESSION['EmpLv'];
  $status = $_SESSION['EmpStatus_tbl'];
 	if($level!='Admin'){
    Header("Location: ../logout.php");  
  }  
?>
<link rel="stylesheet" type="text/css" href="stlye.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js
"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js
"></script>

<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin.php">TrainingRecord</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

  

      <li class="nav-item">
        <a class="nav-link" href="emptable.php">
          <i class="fa fa-book">
            </i>
            จัดการฝึกอบรม
        </a>
      </li>
 
     
      <li class="nav-item">
        <a class="nav-link" href="fetch_department.php">
          <i class="fa fa-id-card-o">
            </i>
            จัดการหน่วยงาน
        </a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link" href="fetch_category.php">
          <i class="fa fa-bars">
            </i>
            จัดการประเภทการฝึกอบรม
        </a>
      </li>

     

      <li class="nav-item">
        <a class="nav-link" href="fetch_employees.php">
          <i class="fa fa-address-book-o">
            </i>
            จัดการผู้ใช้งาน
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="fetch_position.php">
          <i class="fa fa-users">
            </i>
              จัดการตำแหน่งงาน
        </a>
      </li>
      
    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
         </i>
          ผู้ใช้งาน <?php echo $name; ?> สถานะ <?php echo $level; ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
        <i class="fa fa-sign-out"></i>
          </i>
         Logout
        </a>
      </li>
    </ul>
  
   
  </div>
</nav>

