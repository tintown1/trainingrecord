<?php include "connect.php";
$EmpID_tbl=isset($_GET['EmpID_tbl']) ? $_GET['EmpID_tbl']:'';
if($EmpID_tbl!=''){
    $sql = "SELECT * FROM employees where EmpID_tbl='".$EmpID_tbl."'";
    $result = $connect->query($sql);
    $row=$result->fetch_assoc();
    
} 
    
$ID = $_SESSION['EmpID_tbl'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
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
</head>
<body>

<br>
<td></td>
<div class="container"  >

    <form  action="save_training.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>
<table  class="table table-hover table-active "   align = 'center' >
<input class="form-control" id="EmpID_tbl" type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl'];?>" >


<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">เพิ่มการฝึกอบรม</div>
                        <div class="card-body">
                        <form  action="save_training_user.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>
                                <div class="form-group row">
                                    <label for="trainingStartDate_tbl" class="col-md-4 col-form-label text-md-right">วันเริ่มฝึกอบรม</label>
                                    <div class="col-md-6">
                                        <input type="date" id="trainingStartDate_tbl" class="form-control" name="trainingStartDate_tbl" required>
                                        <div class="invalid-feedback">
                                        กรุณาเลือกวันที่เริ่ม
                                        </div>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="trainingEndDate_tbl" class="col-md-4 col-form-label text-md-right">วันสิ้นสุดฝึกอบรม</label>
                                    <div class="col-md-6">
                                        <input type="date" id="trainingEndDate_tbl" class="form-control" name="trainingEndDate_tbl" required>
                                        <div class="invalid-feedback">
                                        กรุณาเลือกวันที่สิ้นสุด
                                        </div>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="trainingCourse_tbl" class="col-md-4 col-form-label text-md-right">หลักสูตร</label>
                                    <div class="col-md-6">
                                        <input type="text" id="trainingCourse_tbl" class="form-control" placeholder="หลักสูตร"  name="trainingCourse_tbl" required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกหลักสูตร
                                        </div>   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="location_tbl" class="col-md-4 col-form-label text-md-right">สถานที่</label>
                                    <div class="col-md-6">
                                        <input type="text" id="location_tbl" class="form-control" placeholder="สถานที่"  name="location_tbl" required>
                                        <div class="invalid-feedback">
                                        กรุณากรอกสถานที่
                                        </div>   
                                    </div>
                                </div>
                            

                                <div class="form-group row">
                                    <label for="CategoryID_tbl" class="col-md-4 col-form-label text-md-right">ประเภท</label>
                                    <div class="col-md-6">
                                    <?php 
	                                    $select_data = "SELECT * FROM category" 
			                            or die ("Error : ".mysqlierror($select_data));
                                        $rs_select = mysqli_query($connect, $select_data);
                                        //echo ($query_level);//test query
	                                    ?>
    					                <select class="form-control select2" name="CategoryName_tbl" required>
    					                <option  value="">--เลือก--</option>
    					                 <?php foreach ($rs_select as $rs) {?>
    					            	<option  value="<?php echo $rs['CategoryName_tbl']; ?>">
    					  	            <?php echo $rs['CategoryName_tbl']; ?>
    					  	            </option>
    					                <?php }?>
                          
						                </select>	
                                        <div class="invalid-feedback">
                                        กรุณาเลือกประเภท
                                        </div>                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">ประกาศนียบัตร</label>
                                    <div class="col-md-6">
                                    <input  value="มี"  type="radio" id="trainingCertificate_tbl" name="trainingCertificate_tbl" placeholder="หลักสูตร" required >มี
                                    <input value="ไม่มี"  type="radio" id="trainingCertificate_tbl" name="trainingCertificate_tbl" placeholder="หลักสูตร" required >ไม่มี
                                    <div class="invalid-feedback">
                                        กรุณาเลือกว่ามีหรือไม่
                                        </div>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="permanent_address" class="col-md-4 col-form-label text-md-right">UPLOAD PDF</label>
                                    <div class="col-md-6">
                                    <input type="file"  id="trainingPDF_tbl" name="trainingPDF_tbl"  accept=".pdf,.csv">
                                    </div>
                                </div>

                                   
                                      <center>  <button type="submit" class="btn btn-primary">
                                        บันทึก
                                        </button>
                                        &nbsp;
                                   
                                   <button type="reset" class="btn btn-primary">
                                   รีเซ็ต
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