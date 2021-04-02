<?php
include "connect.php";
// $sql = "SELECT * FROM trainingtbl,employees,category
//                 where employees.trainingID_tbl = trainingtbl.trainingID_tbl
//                  and category.categoryID_tbl = trainingtbl.trainingID_tbl ";
//  $result = $connect->query($sql);
$ID = $_SESSION['EmpID_tbl'];
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
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- นำเข้า  Javascript จาก  Jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- นำเข้า  Javascript  จาก   dataTables -->
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
        $(function() {
            //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
            $('#example').dataTable();
        });
    </script>
    
<style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #4CAF50;
}

.button5:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

</style>
<style>
.buttonsec {
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white;
  color: black;
  border: 2px solid #0099ff;
}

.button1:hover {
  background-color: #0099ff;
  color: white;
}

.button2 {
  background-color: white;
  color: red;
  border: 2px solid #F50000;
}

.button2:hover {
  background-color: #F50000;
  color: white;
}

</style>
    <?php 
            include('home_member.php');
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

    <div class="container fonts" style="margin-top:10px;">
   <div class="content_left" >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/feedback.js"></script>
</head>

<body>
<?php
$sql = "SELECT * FROM employees emp
                                  JOIN trainingtbl tn
                                  ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                                  JOIN category c
                                  ON c.CategoryName_tbl = tn.trainingCategory_tbl
                                
                                  WHERE emp.EmpID_tbl = '".$ID."'";
                                  $result = $connect->query($sql);
                                  $row=$result->fetch_assoc();
                      ?>
<center><br></center>
    
    


<!-- Modal -->


</div>
        <h1>จัดการฝึกอบรม</h1>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
        เพิ่มการฝึกอบรม
        </button>
        <div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">เพิ่มการฝึกอบรม</h1>
            </div>
            <div class="modal-body">
                <form role="form" id="form" method="POST" action="save_training_user.php" enctype="multipart/form-data" novalidate>
                <input class="form-control" id="EmpID_tbl" type="hidden" name="EmpID_tbl" value="<?php echo $ID;?>">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">วันเริ่มฝึกอบรม</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="trainingStartDate_tbl" required>
                            <div class="invalid-feedback">
                                        กรุณาเลือกวันที่เริ่ม
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">วันสิ้นสุดฝึกอบรม</label>
                        <div>
                            <input type="date" class="form-control input-lg" name="trainingEndDate_tbl" required>

                            <div class="invalid-feedback">
                                        กรุณาเลือกวันที่สิ้นสุด
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">หลักสูตร</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="trainingCourse_tbl" placeholder="หลักสูตร" required> 
                            <div class="invalid-feedback">
                                        กรุณากรอกหลักสูตร
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">สถานที่</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="location_tbl"  placeholder="สถานที่" required>
                            <div class="invalid-feedback">
                                        กรุณากรอกสถานที่
                                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">ประเภท</label>
                        <div>
                        <?php 
	                                    $select_data = "SELECT * FROM category" 
			                            or die ("Error : ".mysqlierror($select_data));
                                        $rs_select = mysqli_query($connect, $select_data);
                                        //echo ($query_level);//test query
	                                    ?>
    					                <select class="form-control input-lg" name="CategoryName_tbl" required>
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
                    <div class="form-group">
                    <label class="control-label">ประกาศนียบัตร</label>
                        <div>
                            <div class="form-group">
                                
                                
                                    <input type="radio"  value="มี" id="trainingCertificate_tbl" name="trainingCertificate_tbl" required>มี
                                
                                    &nbsp;
                                    <input type="radio"  value="ไม่มี" id="trainingCertificate_tbl" name="trainingCertificate_tbl" required>ไม่มี
                                   
                             
                                <div class="invalid-feedback">
                                        กรุณาเลือกข้อมูล
                                        </div> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">UPLOAD PDF</label>
                        <div>
                            <input type="file" class="form-control input-lg" name="trainingPDF_tbl"  accept=".pdf,.csv">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success" id="alertbox">บันทึกข้อมูล</button>
                           
                            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p id="error"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- <button type="button" class="button button5" onclick="window.location='insert_traininguser.php'">เพิ่มการฝึกอบรม</a></button> -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='excel_training_user.php'">ดาวน์โหลดลง excel</button>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='importcsv.php'">ImportCSV</a></button>
        <button type="button"  class="btn btn-primary btn-lg" data-toggle="modal"  onclick="window.open('print.php', '_blank');" >Print</a></button>
        <form target="_blank">
        <br>
        </h1>
        
        <form target="_blank">
        
       
        </form>
        <table class="table table-info"  id="example"   >
            <thead>
            
                <tr class="info" >
                    
                    
                    <!-- <th class="text-center" nowrap>ชื่อ</th>
                    <th class="text-center" nowrap>นามสกุล</th> -->
                    
                    <th class="text-center" nowrap>วันเริ่มอบรม</th>
                    <th class="text-center" nowrap>หลักสูตร</th>
                    
                    <th class="text-center" nowrap>แก้ไข</th>
                    <th class="text-center" nowrap>ลบ</th>
                    

                   
                    
                    
                </tr>
                
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employees emp
                                  JOIN trainingtbl tn
                                  ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                                  JOIN category c
                                  ON c.CategoryName_tbl = tn.trainingCategory_tbl
                                
                                  WHERE emp.EmpID_tbl = '".$ID."'";
                // $sql = "SELECT * FROM trainingtbl,employees,category,certificate
                // where employees.EmpID_tbl = trainingtbl.trainingEmpID_tbl
                // and  employees.EmpID_tbl = '".$ID."' 
                // and category.categoryID_tbl = trainingtbl.trainingCategory_tbl 
                // and certificate.certificateID = trainingtbl.trainingCertificate_tbl";
             // $sql=" SELECT * FROM employees INNER JOIN trainingtbl,category WHERE employees.EmpFirstName_tbl = 'NATTHAWUT'";
                
               
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                      $date =  $row['trainingStartDate_tbl'];
                      list($y,$m,$d) = explode('-',$date);
                        echo "<tr>";
                        //echo '<td ><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . '+' . '</a></button></td>';
                        //echo "<td align='center'>" . $row["trainingID_tbl"] . "</td>";
                        // echo "<td nowrap><center>" . $row["EmpFirstName_tbl"] . "</td>";
                        // echo "<td nowrap><center>" . $row["EmpLastName_tbl"] . "</td>";
                       
                        echo "<td nowrap><center>" . $d.'/'.$m.'/'.$y . "</td>";
                        
                        echo "<td nowrap><center>" . $row["trainingCourse_tbl"] . "</td>";
                        //echo '<td><center><a href="download.php?file='.$row['trainingPDF_tbl'].'">'.'Download'.'</a></td>';
                        echo '<td><center><button class="btn btn-success"><a href="edit_traininguser.php?trainingID_tbl=' . $row['trainingID_tbl'] . '">' . 'แก้ไข' . '</a></button></td>';
                        
                        echo "<td><center><button class='btn btn-danger'><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_traininguser.php?trainingID_tbl=".$row['trainingID_tbl']."'>ลบ</a></button></td>";
                        
                        //echo '<td><center><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . '+' . '</a></button></td>';
                        echo "</tr>";
                    }
                }
                $connect->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    function openNewTab() {
        window.open("print.php");
    }
</script>

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
$(document).ready(function(){
  $('#alertbox').click(function(){
    $("#error").html("You Clicked on Click here Button");
      $('#myModal').modal("show");
    });
  })
  </script>
</html>