<?php include "connect.php"; 
$CategoryID_tbl=isset($_GET['CategoryID_tbl']) ? $_GET['CategoryID_tbl']:'';
if($CategoryID_tbl!=''){
    $sql = "SELECT * FROM category where CategoryID_tbl='".$CategoryID_tbl."'";
    $result = $connect->query($sql);
    $row=$result->fetch_assoc();
    
}
?>
<!doctype html>

<html lang="en"> 
<head>
<meta charset="UTF-8">
<title>แก้ไขข้อมูลประเภท</title>
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
  <link href="validator.css" rel="stylesheet">
<script src="jquery.min.js"></script>
<script src="jquery.form.validator.min.js"></script>
<script src="security.js"></script>
<script src="file.js"></script>

</head>
<body>

<div class="container">
<br><br>
<?php
if(isset($_POST['edit_btn']))
{
    $id = $_POST['CategoryID_tbl'];
    $sql = "SELECT * FROM category where CategoryID_tbl='".$id."'";
    $query = mysqli_query($connect,$sql);

    foreach($query as $row)
    {
    
?>
<form action="save_editcategory.php" method="post" class="form-horizontal" role="form"   id="form" novalidate>
<table  class="table table-hover table-active"  border=1 align = 'center' >

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">แก้ไขประเภทการอบรม</div>
                        <div class="card-body">
                        <form  action="save_editdepartment.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>
                      
                        
                        
                                      
                       

                        <div class="form-group row">
                        <label for="CategoryID_tbl" class="col-md-4 col-form-label text-md-right">ID</label>
                        <div class="col-md-6">
                        <input class="form-control" data-validation="required" type="text" name="CategoryID_tbl"  disabled='disabled' value="<?php echo $row['CategoryID_tbl'];?>" >
                        <input class="form-control" data-validation="required" type="hidden" name="CategoryID_tbl" placeholder="id" value="<?php echo $row['CategoryID_tbl'];?>" >               
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="CategoryName_tbl" class="col-md-4 col-form-label text-md-right">หน่วยงาน</label>
                        <div class="col-md-6">
                        <input class="form-control" type="text" name="CategoryName_tbl"   placeholder="ประเภทการฝึกอบรม" value="<?php echo $row['CategoryName_tbl'];?>" required>
                        <div class="invalid-feedback">
                                        กรุณากรอกประเภทการฝึกอบรม
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
    <script>
 $.validate({
 modules: 'security, file',
 onModulesLoaded: function () {
 $('input[name="pass_confirmation"]').displayPasswordStrength();
 }
 });
 </script>


</body>
</html>