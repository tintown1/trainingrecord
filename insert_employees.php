<?php include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="icon" href="../../favicon.ico">


<?php 
            include('home_admin.php');
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

    <title>employees</title>
</head>
<body>

<br>
<td></td>
<div class="container"  >


    <form   action="save_employees.php" method="post"  class="form-horizontal" role="form"   id="form" novalidate>
<table  class="table table-hover table-active "   align = 'center' >

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">เพิ่มผู้ใช้งาน</div>
                        <div class="card-body">
                        <form  action="save_employees.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>



                        <div class="form-group row">
                        <label for="StaffID" class="col-md-4 col-form-label text-md-right">รหัสพนักงาน</label>
                        <div class="col-md-6">
                        <input class="form-control"  type="number" min="5" max="5" name="StaffID" placeholder="รหัสพนักงาน"  required>
                    <div class="invalid-feedback">
                                        กรุณากรอกรหัสพนักงาน
                                        </div> 
                                      
                        </div>
                        </div>


                        <div class="form-group row">
                        <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">ชื่อ</label>
                        <div class="col-md-6">
                        <input class="form-control"  type="text" name="EmpFirstName_tbl" placeholder="ชื่อ"  required>
                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อ
                                        </div> 
                                      
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                        <div class="col-md-6">
                        <input class="form-control"  type="text" name="EmpLastName_tbl"  placeholder="นามสกุล"  required>
                        <div class="invalid-feedback">
                                        กรุณากรอกนามสกุล
                                        </div> 
                                        
                        </div>
                        </div>

                

                                <div class="form-group row">
                                    <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">วันเริ่มงาน</label>
                                    <div class="col-md-6">
                                        <input type="date" id="EmpStartDate_tbl" class="form-control" name="EmpStartDate_tbl"   required>
                                        <div class="invalid-feedback">
                                        กรุณาเลือกวันที่เริ่ม
                                        </div>  
                                    </div>
                                </div>

                        

                                <div class="form-group row">
                                    <label for="trainingCourse_tbl" class="col-md-4 col-form-label text-md-right">สังกัด</label>
                                    <div class="col-md-6">
                                    <?php
                                $select_data = "SELECT * FROM department"
                                    or die("Error : " . mysqlierror($select_data));
                                $rs_select = mysqli_query($connect, $select_data);
                                //echo ($query_level);//test query
                                ?>
                                <select class="form-control select2" name="departmentID_tbl" required>
                                    <option value="">--เลือก--</option>
                                    <?php foreach ($rs_select as $rs) { ?>
                                        <option value="<?php echo $rs['departmentID_tbl']; ?>">
                                            <?php echo $rs['departmentName_tbl']; ?>
                                        </option>
                                    <?php } ?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกสังกัด
                                    </div> 		
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="location_tbl" class="col-md-4 col-form-label text-md-right">อีเมล</label>
                                    <div class="col-md-6">
                                        <input type="text" id="EmpEmail_tbl" class="form-control" placeholder="Email"  name="EmpEmail_tbl"  required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกอีเมล
                                        </div>   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EmpPassword_tbl" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input type="password" id="EmpPassword_tbl" class="form-control" placeholder="รหัสผ่าน"  name="EmpPassword_tbl"
                                        maxlength="5" minlength="5" min="1" max="99999" oninput="this.value.length<this.maxLength?this.min=Math.pow(10, this.value.length):this.min=0" onkeypress="return (this.value.length>=this.maxLength)?false:true"  required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกPassword
                                        </div>   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="level_name" class="col-md-4 col-form-label text-md-right">สถานะ</label>
                                    <div class="col-md-6">
                                    <?php
                                $select_data = "SELECT * FROM level"
                                    or die("Error : " . mysqlierror($select_data));
                                $rs_select = mysqli_query($connect, $select_data);
                                //echo ($query_level);//test query
                                ?>
                                <select class="form-control select2" name="level_name" required>
                                    <option value="">--เลือก--</option>
                                    <?php foreach ($rs_select as $rs) { ?>
                                        <option value="<?php echo $rs['level_name']; ?>">
                                            <?php echo $rs['level_name']; ?>
                                        </option>
                                    <?php } ?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกสถานะ
                                    </div> 		
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="p_name" class="col-md-4 col-form-label text-md-right">ตำแหน่งงาน</label>
                                    <div class="col-md-6">
                                    <?php
                                $select_data = "SELECT * FROM position"
                                    or die("Error : " . mysqlierror($select_data));
                                $rs_select = mysqli_query($connect, $select_data);
                                //echo ($query_level);//test query
                                ?>
                                <select class="form-control select2" name="p_name" required>
                                    <option value="">--เลือก--</option>
                                    <?php foreach ($rs_select as $rs) { ?>
                                        <option value="<?php echo $rs['p_name']; ?>">
                                            <?php echo $rs['p_name']; ?>
                                        </option>
                                    <?php } ?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกตำแหน่งงาน
                                    </div> 		
                                    </div>
                                </div>
                                

                

                                

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        บันทึก
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>



<script language="JavaScript">
        document.getElementById('EmpPassword_tbl').onkeyup = function(e) {
            if (e.keyCode == 32 && this.value.indexOf(' ') == 0)

            {

                document.getElementById('EmpPassword_tbl').value = "";
                return false;
            }
        }
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
    </script> 
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
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
<?php
include('includes/scripts.php');
?>
</body>
</html>