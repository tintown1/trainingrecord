<?php
include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>รายชื่อผู้ใช้งาน</title>

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

        <h1 class="card-title"> &nbsp;รายชื่อผู้ใช้งาน</h1>
        <div class="container">
        
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
        เพิ่มผู้ใช้งาน
        </button>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='importemp.php'">ImportCSV</a></button>
        <div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">เพิ่มผู้ใช้งาน</h1>
            </div>
            <div class="modal-body">
                <form role="form" id="form" method="POST" action="save_employees.php" enctype="multipart/form-data" novalidate>

                <div class="form-group">
                        <label class="control-label">รหัสพนักงาน</label>
                        <div>
                            <input type="text"  pattern="[0-9]{1,}"  maxlength="6" minlength="6" min="1" max="99999" 
                            oninput="this.value.length<this.maxLength?this.min=Math.pow(10, this.value.length):this.min=0" onkeypress="return (this.value.length>=this.maxLength)?false:true" class="form-control input-lg" 
                           id="EmpID_tbl" placeholder="รหัสพนักงาน" name="EmpID_tbl" required>
                            <div class="invalid-feedback">
                                        กรุณากรอกรหัสพนักงานไม่เกิน 5 ตัว
                                        </div> 
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label class="control-label">ชื่อ</label>
                        <div>
                            <input type="text" class="form-control input-lg" 
                           id="EmpFirstName_tbl" placeholder="ชื่อ" name="EmpFirstName_tbl" required>
                            <div class="invalid-feedback">
                                        กรุณากรอกชื่อ
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">นามสกุล</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="EmpLastName_tbl" placeholder="นามสกุล" name="EmpLastName_tbl" required>

                            <div class="invalid-feedback">
                                        กรุณากรอกนามสกุล
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">วันเริ่มงาน</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="EmpStartDate_tbl" placeholder="วันเริ่มงาน" required> 
                            <div class="invalid-feedback">
                                        กรุณาเลือกวันเริ่มงาน
                                        </div> 
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="control-label">สังกัด</label>
                        <div>
                        <?php 
	                                    $select_data = "SELECT * FROM department" 
			                            or die ("Error : ".mysqlierror($select_data));
                                        $rs_select = mysqli_query($connect, $select_data);
                                        //echo ($query_level);//test query
	                                    ?>
    					                <select class="form-control input-lg" name="departmentID_tbl" required>
    					                <option  value="">--เลือก--</option>
    					                 <?php foreach ($rs_select as $rs) {?>
    					            	<option  value="<?php echo $rs['departmentID_tbl']; ?>">
    					  	            <?php echo $rs['departmentName_tbl']; ?>
    					  	            </option>
    					                <?php }?>
                          
						                </select>	
                            <div class="invalid-feedback">
                                        กรุณาเลือกสังกัด
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">อีเมล</label>
                        <div>
                            <input type="email" id="EmpEmail_tbl" class="form-control input-lg" placeholder="อีเมล" name="EmpEmail_tbl" required>

                            <div class="invalid-feedback">
                                        กรุณากรอกอีเมล
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">รหัสผ่าน</label>
                        <div>
                            <input type="password" class="form-control input-lg" id="EmpPassword_tbl" title="กรุณากรอกอย่างน้อย 5 ตัวอักษร" placeholder="รหัสผ่าน" name="EmpPassword_tbl"
                            maxlength="5" minlength="5" min="1" max="99999" oninput="this.value.length<this.maxLength?this.min=Math.pow(10, this.value.length):this.min=0" onkeypress="return (this.value.length>=this.maxLength)?false:true"  required>

                            <div class="invalid-feedback">
                                        กรุณากรอกรหัสผ่าน5ตัว
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">สถานะ</label>
                        <div>
                        <?php 
	                                    $select_data = "SELECT * FROM level" 
			                            or die ("Error : ".mysqlierror($select_data));
                                        $rs_select = mysqli_query($connect, $select_data);
                                        //echo ($query_level);//test query
	                                    ?>
    					                <select class="form-control input-lg" name="level_name" required>
    					                <option  value="">--เลือก--</option>
    					                 <?php foreach ($rs_select as $rs) {?>
    					            	<option  value="<?php echo $rs['level_name']; ?>">
    					  	            <?php echo $rs['level_name']; ?>
    					  	            </option>
    					                <?php }?>
                          
						                </select>	
                            <div class="invalid-feedback">
                                        กรุณาเลือกสถานะ
                                        </div> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">ตำแหน่งงาน</label>
                        <div>
                        <?php 
	                                    $select_data = "SELECT * FROM position" 
			                            or die ("Error : ".mysqlierror($select_data));
                                        $rs_select = mysqli_query($connect, $select_data);
                                        //echo ($query_level);//test query
	                                    ?>
    					                <select class="form-control input-lg" name="p_id" required>
    					                <option  value="">--เลือก--</option>
    					                 <?php foreach ($rs_select as $rs) {?>
    					            	<option  value="<?php echo $rs['p_id']; ?>">
    					  	            <?php echo $rs['p_name']; ?>
    					  	            </option>
    					                <?php }?>
                          
						                </select>	
                            <div class="invalid-feedback">
                                        กรุณาเลือกตำแหน่งงาน
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success" name="submit" id="myModal">บันทึกข้อมูล</button>
                  
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br><br>
<?php

if(isset($_REQUEST['EmpID_tbl'])){
    $empid=mysqli_real_escape_string($connect,$_REQUEST['EmpID_tbl']);
    $type=mysqli_real_escape_string($connect,$_REQUEST['type']);
    if($type=='active'){
        $status=1;
    }else{
        $status=0;
    }
    mysqli_query($connect,"UPDATE employees SET EmpStatus_tbl = '$status' WHERE EmpID_tbl = '$empid'");

}

                $sql = "SELECT * FROM employees
                                 JOIN department
                                 ON employees.Empdepartment_tbl = department.departmentID_tbl";
                                 ?>
                                 
                                
                                 
        <table class="table table-info" id="example">
            <thead>
                <tr class="info">
                    <th class="text-center" nowrap>รหัสพนักงาน</th>
                    <th class="text-center" nowrap>ชื่อ-นามสกุล</th>
                    
                    <th class="text-center" nowrap>วันเริ่มงาน</th>
                    <th class="text-center" nowrap>สังกัด</th>
                    <th class="text-center" nowrap>อีเมล</th>
                    <th class="text-center" nowrap>สถานะ</th>
                    
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    
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
                            <td><center><?php echo $row['EmpEmail_tbl']; ?></td>
                        
                            
                            <td class="text-center">
                                    <?php
                                    if($row['EmpStatus_tbl']==1){
                                    

                                        echo "<a href ='?EmpID_tbl=".$row['EmpID_tbl'].
                                        "&type=deactive'><span class='btn btn-success'>Active</a></span>";
                                    }else{
                                        echo "<a href ='?EmpID_tbl=".$row['EmpID_tbl'].
                                        "&type=active'><span class='btn btn-danger'>Deactive</a></span>";
                                    }
                                    ?>

                       <td>
                       <form action="edit_employees.php"  method="POST">
                        <input type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl']; ?>">
                        <center><button type="submit" name="edit_btn" class="btn btn-success">แก้ไข</button>
                        </form>
                        </td>

                        <td>
                       <form action="delete_employees.php"  method="POST">
                        <input type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl']; ?>">
                        <center><button class="btn btn-danger" name="delete_btn" type="button" onclick="validateForm(this)" value="<?php echo $row['EmpID_tbl']; ?>">ลบ</button>
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