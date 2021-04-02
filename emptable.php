<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>จัดการฝึกอบรม</title>

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
    
    <div class="container">
    
       

        
</div>
      
        <div class="row justify-content">
        <div class="col-md-12 mt-3">
        <div class="card">

        <h1 class="card-title"> &nbsp;จัดการฝึกอบรม</h1>
        <div class="container">
        
        
<?php



                $sql = "SELECT * FROM employees
                                 JOIN department
                                 ON employees.Empdepartment_tbl = department.departmentID_tbl
                                 JOIN position
                                 ON employees.EmpPosition_tbl = position.p_id
                                 WHERE employees.EmpLv = 'Member'";
                                 ?>
                                 
                                
                                 
        <table class="table table-info" id="example">
            <thead>
                <tr class="info">
                    <th class="text-center" nowrap>รหัสพนักงาน</th>
                    <th class="text-center" nowrap>ชื่อ-นามสกุล</th>
                    
                    <th class="text-center" nowrap>วันเริ่มงาน</th>
                    <th class="text-center" nowrap>สังกัด</th>
                    <th class="text-center" nowrap>ตำแหน่ง</th>
                    <th class="text-center" nowrap>ประวัติการฝึกอบรม</th>
                    
                
                    
                </tr>
            </thead>
            <tbody>
               <?php
                // $sql = "SELECT * FROM employees,department
                //                  where department.departmentID_tbl = employees.Empdepartment_tbl";
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $date = date("d/m/Y",strtotime($row['EmpStartDate_tbl'])); 
                    //     $date =  $row['EmpStartDate_tbl'];
                    //   list($y,$m,$d) = explode('-',$date);
                    
                    ?>
                    
                    <tr>
                            <td><center><?php echo $row['EmpID_tbl']; ?></td>
                            <td><center><?php echo $row['EmpFirstName_tbl'].' '.$row['EmpLastName_tbl']; ?></td>
                            <td><center><?php echo $date; ?></td>
                            <td><center><?php echo $row['departmentName_tbl']; ?></td>
                            <td><center><?php echo $row['p_name']; ?></td>
                        
                        
                                

                       <td>
                       <form action="fetch_training.php"  method="POST">
                        <input type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl']; ?>">
                        <center><button type="submit" name="detail" class="btn btn-success">ดูรายละเอียด</button>
                        </form>
                        </td>
                        
                        

                        <!-- echo "<tr>";
                        echo "<td>" . $row["EmpID_tbl"] . "</td>";
                        echo "<td>" . $row["EmpFirstName_tbl"] . "</td>";
                        echo "<td>" . $row["EmpLastName_tbl"] . "</td>";
                        echo "<td>" . $d.'/'.$m.'/'.$y . "</td>";
                        echo "<td>" . $row["departmentName_tbl"] . "</td>";
                        echo "<td>" . $row["EmpEmail_tbl"] . "</td>";
                        
                        //echo "<td>" . $row["EmpPassword_tbl"] . "</td>";
                        echo '<td><button><a href="edit_employees.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . 'แก้ไข' . '</a></button></td>';
                        
                        echo "<td><button><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_employees.php?EmpID_tbl=".$row['EmpID_tbl']."'>ลบ</a></button></td>";
                        echo '<td><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . 'เพิ่มอบรม' . '</a></button></td>';
                        echo "</tr>"; -->
                      
                       
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
<script type="text/javascript">
$(function(){
     
    $("#trainingPDF_tbl").on("change",function(){
        var _fileName;
        var _maxFileSize = 2000000; // ไม่เกิน 2 MB
        var _allowFileType = ["application/pdf"]; // กำหนดชนิดไฟลที่อนุญาต
        // กำหนดข้อความ อ้างอิงค่าจาก key index ของตัวแปร _statusFileCode
        var _waringTextValue = ["กรุณาเลือกไฟล์","ขนาดไฟล์ไม่เกิน 2 MB","อนุญาตเฉพาะไฟล์ PDF"];
         
        if(window.FileReader && window.Blob) {
            // All the File APIs are supported.
            var files = $(this)[0].files;
            var _fileNameArr = [];
            var _statusFile = true;
            var _statusFileCode = 0;
             
            for (var i = 0; i < files.length; i++) {
                _fileNameArr.push(files[i].name);
                if(files[i].size > _maxFileSize){
                    _statusFile = false;
                    _statusFileCode = 1;
                }
                if($.inArray(files[i].type, _allowFileType) === -1 ){
                    _statusFile = false;
                    _statusFileCode = 2;
                }               
            }       
            _fileName =     _fileNameArr.join(","); 
            if(_fileName==""){
                _statusFile = false;
            }
            // ส่วนของเงื่อนไข 
            if(_statusFile==false){ // ไม่ผ่านเงื่อนไข
                $("#trainingPDF_tbl").val("");
                $("#trainingPDF_tbl").next("div.invalid-feedback").text(_waringTextValue[_statusFileCode]);
            }else{ // ผ่านเงื่อนไข
                $("#trainingPDF_tbl").val("ok");
            }
        }else{
            var _filePath = $(this).val();
            var _fileName = _filePath.split("\\");
            _fileName = _fileName.pop();                        
        }   
        $(this).next("label").text(_fileName);  
    });
     
     $("#form").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });
});
</script>
<script language="JavaScript">
        document.getElementById('EmpPassword_tbl').onkeyup = function(e) {
            if (e.keyCode == 32 && this.value.indexOf(' ') == 0)

            {

                document.getElementById('EmpPassword_tbl').value = "";
                return false;
            }
        }
    
    </script>
    <script language="JavaScript">
    document.getElementById('EmpFirstName_tbl').onkeyup = function(e) {
      if (e.keyCode == 32 && this.value.indexOf(' ') == 0)

      {

        document.getElementById('EmpFirstName_tbl').value = "";
        return false;
      }
    }
    document.getElementById('EmpLastName_tbl').onkeyup = function(e) {
      if (e.keyCode == 32 && this.value.indexOf(' ') == 0)

      {

        document.getElementById('EmpLastName_tbl').value = "";
        return false;
      }
    }
    document.getElementById('EmpEmail_tbl').onkeyup = function(e) {
      if (e.keyCode == 32 && this.value.indexOf(' ') == 0)

      {

        document.getElementById('EmpEmail_tbl').value = "";
        return false;
      }
    }
   
    // สเปคบาข้างหน้าไม่ได้
  </script>
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
            document.location.href = 'delete_employees.php?EmpID_tbl='+e.value;
             
            
        }
        
        else {
            swal("ยกเลิกการลบข้อมูล", "", "error");
        }
    });
}

</script>

<script>
        $.validate({
            modules: 'security, file',
            onModulesLoaded: function() {
                $('input[name="pass_confirmation"]').displayPasswordStrength();
            }
        });
    </script>
    
<?php
include('includes/scripts.php');
?>
</html>