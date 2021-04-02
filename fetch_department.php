<?php 
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>จัดการหน่วยงาน</title>
 
        <!-- นำเข้า  CSS จาก Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        
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

        <h1 class="card-title"> &nbsp;จัดการหน่วยงาน</h1>
        <div class="container">


<button type="button" name="submit" class="btn btn-primary btn-lg" onclick="window.location='insert_department.php'">เพิ่มหน่วยงาน</a></button>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='importdepart.php'">ImportCSV</a></button>
<br><br>
        <table class="table table-info" id="example">
                <thead>
                    <tr class="info">
                        <th class="text-center" nowrap>id</th>
                        <th class="text-center" nowrap>ชื่อ</th>
                        <th class="text-center" nowrap>แก้ไข</th>
                        <th class="text-center" nowrap>ลบ</th>
                        
                    </tr>
                </thead>
                <tbody>
                   <?php
                    $sql = "SELECT * FROM department";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
 
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><center>" . $row["departmentID_tbl"]. "</td>";
                                echo "<td><center>" . $row["departmentName_tbl"]. "</td>";
                               
                                ?>
                                
                                  <td>
                                  <form action="edit_department.php"  method="POST">
                                  <input type="hidden" name="departmentID_tbl" value="<?php echo $row['departmentID_tbl']; ?>">
                                  <center><button type="submit" name="edit_btn"  class="btn btn-success">แก้ไข</button>
                                  </form>
                                  </td>
                                  <td>
                                  <form action="delete_department.php"  method="POST">
                                  <input type="hidden" name="departmentID_tbl" value="<?php echo $row['departmentID_tbl']; ?>">
                                  <center><button type="submit" name="delete_btn" onclick="validateForm(this)"  class="btn btn-danger" value="<?php echo $row['departmentID_tbl'];?>">ลบ</button>
                                  </form>
                                  </td>
                                <!-- echo '<td><button><a href="edit_department.php?departmentID_tbl='. $row['departmentID_tbl']. '">'. 'แก้ไข'. '</a></button></td>';
                                echo "<td><button><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_department.php?departmentID_tbl=".$row['departmentID_tbl']."'>ลบ</a></button></td>"; -->
                              </form>
                              </td>
                              </tr>
                              <?php
                    }
                }
                else{
                    echo "no record";
                }
                $connect->close();
                ?>
                </tbody>
            </table>
            
        </div>
  </body>
  <script>
function validateForm(e) {
    event.preventDefault(); // prevent form submit
    var form = document.forms["myForm"];
    console.log(e.value); // storing the form
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
            document.location.href = 'delete_department.php?departmentID_tbl='+e.value;
             
            
        }
        
        else {
            swal("ยกเลิกการลบข้อมูล", "", "error");
        }
    });
}

</script>
<?php
include('includes/scripts.php');
?>

</html>