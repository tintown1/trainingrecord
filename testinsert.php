<?php include "connect.php";
$EmpID_tbl=isset($_GET['EmpID_tbl']) ? $_GET['EmpID_tbl']:'';
if($EmpID_tbl!=''){
    $sql = "SELECT * FROM employees where EmpID_tbl='".$EmpID_tbl."'";
    $result = $connect->query($sql);
    $row=$result->fetch_assoc();
    
} 
    

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
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >



    <title>Training Record</title>
</head>
<body>

<br>
<td></td>
<div class="container"  >
<h1 align = 'center'>Training Record</h1>
    <form  align = 'center' action="save_training.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form"id="form" novalidate>
<table  class="table table-hover table-active "  border=1 align = 'center' >
<tr>

  <input class="form-control" id="EmpID_tbl" type="hidden" name="EmpID_tbl" value="<?php echo $row['EmpID_tbl'];?>" >
    

 
</tr>
<tr>
<div class="form-group row">
    <label for="input_name" class="col-sm-3 col-form-label text-right">ชื่อ นามสกุล</label>
    <div class="col">
      <input type="date" class="form-control"  name="trainingStartDate_tbl" id="trainingStartDate_tbl"
      autocomplete="off" value="">
      <div class="invalid-feedback">
      กรุณาใส่วันที่
    </div>
</div>
<div class="form-group row">
    <label for="input_email" class="col-sm-3 col-form-label text-right">อีเมล</label>
    <div class="col">
      <input type="email" class="form-control" data-required="กรุณากรอกอีเมล" name="input_email" id="input_email"
      autocomplete="off" value="">
    </div>
</div>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-right">เพศ</legend>
    <div class="col">
        <div class="form-check">
          <input class="form-check-input" data-required="กรุณาเลือกเพศ" type="radio" name="radio_gender" id="radio_gender_1" value="male" >
          <label class="form-check-label" for="radio_gender_1">
            ชาย
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" data-required="กรุณาเลือกเพศ" type="radio" name="radio_gender" id="radio_gender_2" value="female">
          <label class="form-check-label" for="radio_gender_2">
            หญิง
          </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-right">ความสนใจ</legend>
    <div class="col">
      <div class="form-check">
        <input class="form-check-input" data-required="กรุณาเลือกความสนใจ"
        type="checkbox" name="checkbox_hobby1" id="hobby1" value="การออกกำลังกาย">
        <label class="form-check-label" for="hobby1">
          การออกกำลังกาย
        </label>
      </div>    
      <div class="form-check">
        <input class="form-check-input" data-required="กรุณาเลือกความสนใจ"
        type="checkbox" name="checkbox_hobby2" id="hobby2" value="อ่านหนังสือ">
        <label class="form-check-label" for="hobby2">
          อ่านหนังสือ
        </label>
      </div>    
 
    </div>
</div>
 <div class="form-group row">
    <label for="textarea_address" class="col-sm-3 col-form-label text-right">ที่อยู่</label>
    <div class="col">
        <textarea class="form-control" data-required="กรุณากรอกที่อยู่" name="textarea_address" id="textarea_address" rows="3"></textarea>
    </div>
</div>       
 <div class="form-group row">
    <label for="select_province" class="col-sm-3 col-form-label text-right">จังหวัด</label>
    <div class="col">
       <select class="custom-select" data-required="กรุณาเลือกจังหวัด" name="select_province" id="select_province" >
        <option value="">เลือกจังหวัด</option>
        <option value="กรุงเทพ">กรุงเทพ</option>
      </select>    
    </div>
</div>       
<div class="form-group row">
    <label for="input_zipcode" class="col-sm-3 col-form-label text-right">รหัสไปรษณีย์</label>
    <div class="col">
      <input type="number" class="form-control" data-required="กรุณากรอกรหัสไปรณีย์" name="input_zipcode" id="input_zipcode"
      autocomplete="off" value="">
    </div>
</div>       
<div class="form-group row">
    <div class="col-sm-3 offset-sm-3 text-right pt-3">
         <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn btn-primary btn-block">ส่งข้อมูล</button>
    </div>
</div> 
</form> 
  
 </div>
  
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
// ฟังก์ชั่นสำหรับตรวจสอบฟอร์ม มีการส่ง form object เข้าไป
function check_form(obj){
    $(".is-invalid").removeClass("is-invalid");
    var formObj = $(obj);
    var required_count = formObj.find("[data-required]").length; // มีรายการที่จะเช็คกี่รายการ
    var valid_check = true;
    if(required_count && required_count>0){
        var requiredObj = formObj.find("[data-required]"); // ได้รายการที่จะเช็คเป็น array ของ object
        $.each(requiredObj,function(k,v){ // วนลูปรายการที่จะเช็ค
            var typeObj_required = requiredObj.eq(k)[0].tagName.toLowerCase();
            var nameObj = requiredObj.eq(k).attr("name");
            var nodeObj_required = '';
            var requiredText = "";
            if(typeObj_required=='input' || typeObj_required=='select' || typeObj_required=='textarea'){
                nodeObj_required = requiredObj.eq(k).attr("type");
                requiredText = requiredObj.eq(k).data("required");
                if(nodeObj_required=='radio'){
                    if(formObj.find(":radio[name='"+nameObj+"']:checked").length==0){
                        $('html, body').animate({ // สร้างการเคลื่อนไหว
                            scrollTop: requiredObj.eq(k).offset().top-100 // ให้หน้าเพจเลื่อนไปทำตำแหน่งบนสุด
                        }, 0); // ภายในเวลา 0.5 วินาที ---- 1000 เท่ากับ 1 วินาที    
                        valid_check = false;
                        var textAlert = "เลือกหรือกรอกข้อมูลที่จำเป็นให้ครบถ้วน\n-- "+requiredText;
                        alert(textAlert);
                        return false;   
                    }
                }
                if(nodeObj_required=='checkbox'){
                    if(formObj.find(":checkbox[data-required='"+requiredText+"']:checked").length==0){
                        $('html, body').animate({ // สร้างการเคลื่อนไหว
                            scrollTop: requiredObj.eq(k).offset().top-100 // ให้หน้าเพจเลื่อนไปทำตำแหน่งบนสุด
                        }, 0); // ภายในเวลา 0.5 วินาที ---- 1000 เท่ากับ 1 วินาที    
                        valid_check = false;
                        var textAlert = "เลือกหรือกรอกข้อมูลที่จำเป็นให้ครบถ้วน\n-- "+requiredText;
                        alert(textAlert);
                        return false;   
                    }
                }               
            }
            if(requiredObj.eq(k).val()==""){        
                $('html, body').animate({ // สร้างการเคลื่อนไหว
                        scrollTop: requiredObj.eq(k).offset().top-100 // ให้หน้าเพจเลื่อนไปทำตำแหน่งบนสุด
                    }, 0); // ภายในเวลา 0.5 วินาที ---- 1000 เท่ากับ 1 วินาที                   
                requiredObj.eq(k).addClass("is-invalid").focus();
                valid_check = false;
                var textAlert = "เลือกหรือกรอกข้อมูลที่จำเป็นให้ครบถ้วน\n-- "+requiredText;
                alert(textAlert);
                return false;   
            }
        });
        if(valid_check==false){
            return false;   
        }           
    }
}
$(function(){
    // อ้างอิงฟอร์มผ่าน id "myform1" เมื่อมีการ submit
     $("#myform1").on("submit",function(){
         // .ให้คืนอค่านการตรวจสอบฟอร์ม ส่ง $(this)[0] ที่เป็น form object เข้าไปในฟังก์ชั่น
         return check_form($(this)[0]);
     });
});
</script>
</body>
</html>