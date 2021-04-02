<?php
include "connect.php";
// $sql = "SELECT * FROM trainingtbl,employees,category
//                 where employees.trainingID_tbl = trainingtbl.trainingID_tbl
//                 and category.categoryID_tbl = trainingtbl.trainingID_tbl ";
// $result = $connect->query($sql);
// $empid=isset($_GET['EmpID_tbl']) ? $_GET['EmpID_tbl']:'';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Training Record</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" >
    <!-- นำเข้า  CSS จาก Bootstrap -->
  

    <!-- นำเข้า  CSS จาก dataTables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"  > 
    
    <!-- นำเข้า  Javascript จาก  Jquery -->
      <script type="text/javascript" src="js/jquery.min.js"></script>   
    <!-- นำเข้า  Javascript  จาก   dataTables -->
    <script type="text/javascript">
        //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
        $(function() {
            //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
            $('#example').dataTable();
        });
    </script>
   
    <?php 
            include('home_admin.php');
?>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

    <div class="container fonts" style="margin-top:10px;">
   <div class="content_left" >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap-theme.min.css">
<script src="js/boostrapmin.js"></script>
<script type="text/javascript" src="script/feedback.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>

                     
    <div class="row justify-content">
        <div class="col-md-12 mt-3">
        <div class="card">

        <h1 class="card-title"> &nbsp;จัดการฝึกอบรม</h1>
        <div class="container"> 
      
          
        <!-- <form action="excel_training.php" method="post"> -->
        
        <button type="button" name="EmpID_tbl" id="btn_submit" class="btn btn-primary btn-lg" data-toggle="modal" onclick="excel(this)" value="<?php echo $row['EmpID_tbl']; ?>">ดาวน์โหลดลง excel</button>
    
                     
        <button type="button" id="btn_import"class="btn btn-primary btn-lg" data-toggle="modal" onclick="imports(this)" value="<?php echo $row['EmpID_tbl']; ?>">IMPORT CSV</button>
        <br><br>
        <?php


    $id = $_REQUEST['EmpID_tbl'];
    $sql = "SELECT * FROM employees emp 
    JOIN trainingtbl tn 
    ON emp.EmpID_tbl = tn.trainingEmpID_tbl 
    JOIN category c 
    ON tn.trainingCategory_tbl = c.CategoryID_tbl
    WHERE emp.EmpID_tbl = '".$id."'";
    $query = mysqli_query($connect,$sql);

  

                // $sql = "SELECT * FROM employees emp
                // JOIN trainingtbl tn
                // ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                // JOIN category c
                // ON c.CategoryName_tbl = tn.trainingCategory_tbl
              
                // WHERE emp.EmpID_tbl = '".$ID."'";
                // $query = mysqli_query($connect,$sql);
                ?>
        <table class="table table-info"  id="example"   >
            <thead>
            
                <tr class="info" >
                    
                    <th class="text-center" nowrap>รหัสพนักงาน</th>
                    <th class="text-center" nowrap>ชื่อ-นามสกุล</th>
                    
                    <th class="text-center" nowrap>วันเริ่มอบรม</th>
                    <th class="text-center" nowrap>หลักสูตร</th>
                    <th class="text-center" nowrap>แก้ไข</th>
                    <th class="text-center" nowrap>ลบ</th>
                    
                    
                </tr>
                
            </thead>
            <tbody>
                <?php
                // $sql = "SELECT * FROM employees emp
                // JOIN trainingtbl tn
                // ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                // JOIN category c
                // ON c.CategoryName_tbl = tn.trainingCategory_tbl";
                // $sql = "SELECT * FROM trainingtbl,employees,category,certificate
                // where employees.EmpID_tbl = trainingtbl.trainingEmpID_tbl
                // and category.categoryID_tbl = trainingtbl.trainingCategory_tbl 
                // and certificate.certificateID = trainingtbl.trainingCertificate_tbl";
             // $sql=" SELECT * FROM employees INNER JOIN trainingtbl,category WHERE employees.EmpFirstName_tbl = 'NATTHAWUT'";
                
               
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()){
                      $date = date("d/m/Y",strtotime($row['trainingStartDate_tbl'])); 
                        // $date =  $row['trainingStartDate_tbl'];
                        // list($y,$m,$d) = explode('-',$date);
                        ?>
                        <tr>
                                <input type="hidden" id="excel"  value="<?php echo $row['EmpID_tbl']; ?>">
                             <input type="hidden" id="EmpID_tbl"  value="<?php echo $row['EmpID_tbl']; ?>">
                            <td><center><?php echo $row['EmpID_tbl']; ?></td>
                            <td><center><?php echo $row['EmpFirstName_tbl'].' '.$row['EmpLastName_tbl']; ?></td>
                           
                            <td><center><?php echo $date; ?></td>
                            <td><center><?php echo $row['trainingCourse_tbl']; ?></td>
                       <td>
                       <form action="edit_training.php"  method="POST">
                       <input type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl']; ?>">
                        <input type="hidden" name="trainingID_tbl" value="<?php echo $row['trainingID_tbl']; ?>">
                        <center><button type="submit" name="edit_btn" class="btn btn-success">แก้ไข</button>
                        </form>
                        </td>

                        <td>
                       <form action="delete_training.php"  method="POST">
                       <input type="hidden" name="EmpID_tbl" id="EmpID_tbl" value="<?php echo $row['EmpID_tbl']; ?>">
                        <input type="hidden" name="trainingID_tbl" id="trainingID_tbl" value="<?php echo $row['trainingID_tbl']; ?>">
                        <center><button class="btn btn-danger" name="delete_btn" type="button" onclick="validateForm(this)" value="<?php echo $row['trainingID_tbl']; ?>">ลบ</button>
                        </form>
                        </td>
                        
                        <!-- echo "<tr>";
                        //echo '<td ><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . '+' . '</a></button></td>';
                        echo "<td nowrap><center>" . $row["trainingID_tbl"] . "</td>";
                        echo "<td nowrap><center>" . $row["EmpFirstName_tbl"] . "</td>";
                        echo "<td nowrap><center>" . $row["EmpLastName_tbl"] . "</td>";
                        echo "<td nowrap><center>" . $d.'/'.$m.'/'.$y . "</td>";
                        
                        echo "<td nowrap><center>" . $row["trainingCourse_tbl"] . "</td>";
                       
                        echo '<td><center><button><a href="edit_training.php?trainingID_tbl=' . $row['trainingID_tbl'] . '">' . 'แก้ไข' . '</a></button></td>';
                
                        echo "<td><center><button><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_training.php?trainingID_tbl=".$row['trainingID_tbl']."'>ลบ</a></button></td>";
                        echo '<td><center><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . 'เพิ่มการฝึกอบรม' . '</a></button></td>';
                        echo "</tr>";
                    }
                }
                $connect->close();
                ?> -->
                </tr>
                <?php
                    }
                }
            
                else{
                    echo "no record";
                }
                $connect->close();
                ?>
                <?php
    

                ?>
                <?php

                                     
                ?>
            </tbody>
        </table>
       
    </div>
</body>
<script>
function validateForm(e) {
    event.preventDefault(); // prevent form submit
    var form = document.forms["myForm"];
    var empID = document.getElementById("EmpID_tbl").value;
    // console.log(
    //     document.getElementById("EmpID_tbl").value
    // ); //เช็คค่า Javascripts
     // storing the form
    swal({
        title: "คุณต้องการลบข้อมูลนี้ไหม ?",
        //text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    })
    .then((willDelete) => {
        if (willDelete){
            document.location.href = 'delete_training.php?trainingID_tbl='+e.value+'&EmpID_tbl='+empID;
              
             
            
        }
        
        else {
            swal("ยกเลิกการลบข้อมูล", "", "error");
        }
    });
}

</script>
<script>
function excel(e) {
    
    // event.preventDefault(); // prevent form submit
    // var form = document.forms["myForm"];
    // document.location.href = 'excel_training.php?EmpID_tbl='+e.value;
    // document.getElementById(""); 
}
$(function(){
    // jQuery methods go here...
    $('#btn_submit').click(function(){
       
            var excel =  $('#EmpID_tbl').val()
            document.location.href = 'excel_training.php?EmpID_tbl='+excel;
    });

});
</script>
<script>
function imports(e) {
    
    // event.preventDefault(); // prevent form submit
    // var form = document.forms["myForm"];
    // document.location.href = 'excel_training.php?EmpID_tbl='+e.value;
    // document.getElementById(""); 
}
$(function(){
    // jQuery methods go here...
    $('#btn_import').click(function(){
       
            var imports =  $('#excel').val()
            document.location.href = 'importcsvadmin.php?EmpID_tbl='+imports;
    });

});
</script>
<?php
include('includes/scripts.php');
?>

</html>