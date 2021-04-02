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


<?php 
            include('home_admin.php');
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
</head>
    <title>Position</title>
    
</head>
<body>

<br>
<td></td>
<div class="container"  >


    <form  action="save_position.php" method="post"  class="form-horizontal" role="form"   id="form" novalidate>
<table  class="table table-hover table-active "  border=1 align = 'center' >

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">เพิ่มตำแหน่งงาน</div>
                        <div class="card-body">
                        <form  action="save_department.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>
                                <div class="form-group row">
                                    <label for="p_name" class="col-md-4 col-form-label text-md-right">ตำแหน่งงาน</label>
                                    <div class="col-md-6">
                                        <input type="text" id="p_name" class="form-control"  placeholder="ชื่อตำแหน่งงาน" name="p_name" required>
                                        <div class="invalid-feedback">
                                        กรุณาเพิ่มตำแหน่งงาน
                                        </div>  
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        บันทึก
                                        </button>
                                    </div>
                                    </main>

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
</html>