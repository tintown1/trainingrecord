<?php include "connect.php"; 
$EmpID_tbl=isset($_GET['EmpID_tbl']) ? $_GET['EmpID_tbl']:'';
if($EmpID_tbl!=''){
    $sql = "SELECT * FROM employees 
    JOIN department 
    ON Empdepartment_tbl = departmentID_tbl
    JOIN level
    ON EmpLv = level_name 
    JOIN position
    ON EmpPosition_tbl = p_id
    where EmpID_tbl='".$EmpID_tbl."'";
    $result = $connect->query($sql);
    $row=$result->fetch_assoc();
    
}
?>
<!doctype html>

<html lang="en"> 
<head>
<meta charset="UTF-8">
<title>แก้ไขข้อมูลงบประมาณ</title>
<style>
label{
    display: inline-block;
    width: 100px;
    margin-bottom: 10px;
}
</style>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <?php 
            include('home_admin.php');
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

</head>
<body>
<br>
<div class="container">
<?php
if(isset($_POST['edit_btn']))
{
    $id = $_POST['EmpID_tbl'];
    $sql = "SELECT * FROM employees emp 
    JOIN department 
    ON Empdepartment_tbl = departmentID_tbl
    JOIN level
    ON EmpLv = level_name 
    JOIN position
    ON EmpPosition_tbl = p_id
    where EmpID_tbl='".$id."'";
    $query = mysqli_query($connect,$sql);

    foreach($query as $row)
    {
    
?>
<form  action="save_editemployees.php" method="post" class="form-horizontal" role="form"   id="form" novalidate>
<table  class="table table-hover table-active"  border=1 align = 'center' >

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">แก้ไขข้อมูลพนักงาน</div>
                        <div class="card-body">
                        <form  action="save_editemployees.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>

                        

                        <div class="form-group row">
                        <label for="EmpID_tbl" class="col-md-4 col-form-label text-md-right">รหัสพนักงาน</label>
                        <div class="col-md-6">
                        <input type="hidden" value="<?php echo $row['EmpID_tbl'];?>">
                        <input class="form-control"  type="text"  name="EmpID_tbl" pattern="[0-9]{1,}"  maxlength="5" minlength="5" min="1" max="99999" 
                            
                             
                           id="EmpID_tbl" placeholder="รหัสพนักงาน"   value="<?php echo $row['EmpID_tbl'];?>" required>

                        <div class="invalid-feedback">
                                        กรุณากรอกรหัสผ่าน5ตัว
                                        </div> 
                                      
                        </div>
                        </div>


                        <div class="form-group row">
                        <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">ชื่อ</label>
                        <div class="col-md-6">
                        <input class="form-control"  type="text" name="EmpFirstName_tbl" placeholder="ชื่อ" value="<?php echo $row['EmpFirstName_tbl'];?>" required>
                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อ
                                        </div> 
                                      
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">นามสกุล</label>
                        <div class="col-md-6">
                        <input class="form-control"  type="text" name="EmpLastName_tbl"  placeholder="นามสกุล" value="<?php echo $row['EmpLastName_tbl'];?>" required>
                        <div class="invalid-feedback">
                                        กรุณากรอกนามสกุล
                                        </div> 
                                        
                        </div>
                        </div>

                

                                <div class="form-group row">
                                    <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">วันเริ่มงาน</label>
                                    <div class="col-md-6">
                                        <input type="date" id="EmpStartDate_tbl" class="form-control" name="EmpStartDate_tbl" value="<?php echo $row['EmpStartDate_tbl'];?>"  required>
                                        <div class="invalid-feedback">
                                        กรุณาเลือกวันเริ่มงาน
                                        </div>  
                                    </div>
                                </div>

                        

                                <div class="form-group row">
                                    <label for="departmentID_tbl" class="col-md-4 col-form-label text-md-right">หน่วยงาน</label>
                                    <div class="col-md-6">
                                    <?php 
	                                 $select_data = "SELECT * FROM department" 
			                        or die ("Error : ".mysqlierror($select_data));
                                    $rs_select = mysqli_query($connect, $select_data);
                                    //echo ($query_level);//test query
	                                ?>
    					            <select class="form-control select2" name="departmentID_tbl" required>
    					        <option  value="" required>เลือก</option>
    					        <?php foreach ($rs_select as $rs) {?>
                                 <option value="<?php echo $rs['departmentID_tbl'];?>"<?=$row['departmentID_tbl'] == $rs['departmentID_tbl'] ? ' selected="selected"' : '';?> required>
                                <?php echo $rs['departmentName_tbl'];?>
                                </option>
    					        <?php }?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกหน่วยงาน
                                    </div> 		
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="p_id" class="col-md-4 col-form-label text-md-right">ตำแหน่งงาน</label>
                                    <div class="col-md-6">
                                    <?php 
	                                 $select_data = "SELECT * FROM position" 
			                        or die ("Error : ".mysqlierror($select_data));
                                    $rs_select = mysqli_query($connect, $select_data);
                                    //echo ($query_level);//test query
	                                ?>
    					            <select class="form-control select2" name="p_id" required>
    					        <option  value="" required>เลือก</option>
    					        <?php foreach ($rs_select as $rs) {?>
                                 <option value="<?php echo $rs['p_id'];?>"<?=$row['p_id'] == $rs['p_id'] ? ' selected="selected"' : '';?> required>
                                <?php echo $rs['p_name'];?>
                                </option>
    					        <?php }?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกตำแหน่งงาน
                                    </div> 		
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="location_tbl" class="col-md-4 col-form-label text-md-right">อีเมลล์</label>
                                    <div class="col-md-6">
                                        <input type="email" id="EmpEmail_tbl" class="form-control" placeholder="Email"  name="EmpEmail_tbl" value="<?php echo $row['EmpEmail_tbl'];?>" required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกอีเมล
                                        </div>   
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EmpPassword_tbl" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>
                                    <div class="col-md-6">
                                        <input type="password" id="EmpPassword_tbl" class="form-control" placeholder="รหัสผ่าน"  name="EmpPassword_tbl" value="<?php echo $row['EmpPassword_tbl'];?>" required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกPassword
                                        </div>   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="level_id" class="col-md-4 col-form-label text-md-right">สถานะ</label>
                                    <div class="col-md-6">
                                    <?php 
	                                 $select_data = "SELECT * FROM level" 
			                        or die ("Error : ".mysqlierror($select_data));
                                    $rs_select = mysqli_query($connect, $select_data);
                                    //echo ($query_level);//test query
	                                ?>
    					            <select class="form-control select2" name="level_name" required>
    					        <option  value="" required>เลือก</option>
    					        <?php foreach ($rs_select as $rs) {?>
                                 <option value="<?php echo $rs['level_name'];?>"<?=$row['level_name'] == $rs['level_name'] ? ' selected="selected"' : '';?> required>
                                <?php echo $rs['level_name'];?>
                                </option>
    					        <?php }?>
						        </select>
                                <div class="invalid-feedback">
                                     กรุณาเลือกสถานะ
                                    </div> 		
                                    </div>
                                </div>



                                

                

                                

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="submit" class="btn btn-primary">
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
<?php
    }
}
?>
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


</body>
<?php
include('includes/scripts.php');
?>
</html>