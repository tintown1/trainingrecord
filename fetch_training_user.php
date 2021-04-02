<?php
include "connect.php";
// $sql = "SELECT * FROM trainingtbl,employees,category
//                 where employees.trainingID_tbl = trainingtbl.trainingID_tbl
//                  and category.categoryID_tbl = trainingtbl.trainingID_tbl ";
//  $result = $connect->query($sql);
$ID = $_SESSION['EmpID_tbl'];


$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                   
);    
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
    global $thai_month_arr;   
    $thai_date_return=date("j",$time);   
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
    $thai_date_return.= " ".(date("Y",$time)+543);   
 
    return $thai_date_return;   
} 
function mydate($strDate1){
    list($Y,$m,$d) = explode("-",$strDate1); // แยกข้อความด้วยตัวแบ่ง
    $Y = $Y-543; // จัดรูปแบบปีเป็น ค.ศ. ลบ 543
    $m = sprintf("%'.02d",$m); // จัดรูปแบบเดือน 00
    $d = sprintf("%'.02d",$d); // จัดรูปแบบวัน 00
    $strDate_new = implode("-",array($Y,$m,$d));
    // $strDate_new = "$Y-$m-$d"; // แบบนี้ก็ได้
    return $strDate_new; // ตัวแปรที่ส่งค่ากลับ   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Training Record</title>
    <link href="boostrap/css/boostrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- นำเข้า  CSS จาก Bootstrap -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://รับเขียนโปรแกรม.net/jquery_datepicker_thai/jquery-ui.js"></script>

    <!-- นำเข้า  CSS จาก dataTables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

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

    include('home_member.php');

    ?>
    <script src="sweetalert/jquery-3.6.0.min.js"></script>
    <script src="sweetalert/sweetalert2.all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>

    <div class="container fonts" style="margin-top:10px;">
        <div class="content_left">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap-theme.min.css">
            <script src="js/boostrapmin.js"></script>
            <script type="text/javascript" src="script/feedback.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>
    <?php
    $sql = "SELECT * FROM employees emp
                    JOIN trainingtbl tn
                    ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                    JOIN category c
                    ON c.CategoryID_tbl = tn.trainingCategory_tbl
                    
                    WHERE emp.EmpID_tbl = '" . $ID . "'";
                    
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <center><br></center>




    <!-- Modal -->



    <div class="row justify-content">
        <div class="col-md-12 mt-3">
            <div class="card">

                <h1 class="card-title"> &nbsp;จัดการฝึกอบรม</h1>
                <div class="container">
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
                                        <input class="form-control" id="EmpID_tbl" type="hidden" name="EmpID_tbl" value="<?php echo $ID; ?>">
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
                                                <input type="text" class="form-control input-lg" name="location_tbl" placeholder="สถานที่" required>
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
                                                    or die("Error : " . mysqli_error($select_data));
                                                $rs_select = mysqli_query($connect, $select_data);
                                                //echo ($query_level);//test query
                                                ?>
                                                <select class="form-control input-lg" name="CategoryID_tbl" required>
                                                    <option value="">--เลือก--</option>
                                                    <?php foreach ($rs_select as $rs) { ?>
                                                        <option value="<?php echo $rs['CategoryID_tbl']; ?>">
                                                            <?php echo $rs['CategoryName_tbl']; ?>
                                                        </option>
                                                    <?php } ?>

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


                                                    <input type="radio" value="มี" id="trainingCertificate_tbl" name="trainingCertificate_tbl" required>มี

                                                    &nbsp;
                                                    <input type="radio" value="ไม่มี" id="trainingCertificate_tblh" name="trainingCertificate_tbl" required>ไม่มี


                                                    <div class="invalid-feedback">
                                                        กรุณาเลือกข้อมูล
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="switch">
                                            <div class="form-group">
                                                <label class="control-label">UPLOAD PDF</label>
                                                <div>


                                                    <input type="file" class="form-control input-lg" name="trainingPDF_tbl" accept=".pdf,.csv">

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
                    <!-- <button type="button" class="button button5" onclick="window.location='insert_traininguser.php'">เพิ่มการฝึกอบรม</a></button> -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='excel_training_user.php'">ดาวน์โหลดลง excel</button>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.location='importcsv.php'">ImportCSV</a></button>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="window.open('print.php', '_blank');">Print</a></button>
                    <form target="_blank">
                        <br>
                        </h1>

                        <form target="_blank">


                        </form>
                        <?php
                        $sql = "SELECT * FROM employees emp
                                  JOIN trainingtbl tn
                                  ON emp.EmpID_tbl = tn.trainingEmpID_tbl
                                  JOIN category c
                                  ON c.CategoryID_tbl = tn.trainingCategory_tbl
                                
                                  WHERE emp.EmpID_tbl = '" . $ID . "'";
                             
                        $query = mysqli_query($connect, $sql);
                        ?>

                        <table class="table table-info" id="example">
                            <thead>

                                <tr class="info">


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

                                // $sql = "SELECT * FROM trainingtbl,employees,category,certificate
                                // where employees.EmpID_tbl = trainingtbl.trainingEmpID_tbl
                                // and  employees.EmpID_tbl = '".$ID."' 
                                // and category.categoryID_tbl = trainingtbl.trainingCategory_tbl 
                                // and certificate.certificateID = trainingtbl.trainingCertificate_tbl";
                                // $sql=" SELECT * FROM employees INNER JOIN trainingtbl,category WHERE employees.EmpFirstName_tbl = 'NATTHAWUT'";



                                $result = $connect->query($sql);
                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        // $date=(date("Y")+543);
                                        // $my_strDate = $row['trainingStartDate_tbl'];
                                        // $strDate1=mydate($my_strDate); 
                                        
                                        $strDate = $row['trainingStartDate_tbl'];
                                        $Y = substr($strDate,0,4);
                                        $Y = $Y+543;
                                        $m = substr($strDate,5,2);
                                        $d = substr($strDate,8,2);
                                        $strDate_new = implode("/",array($d,$m,$Y));
                                        // echo $strDate_new;
                                        //  $date = date("d/m/Y",strtotime($row['trainingStartDate_tbl']));
                                        // $row['trainingStartDate_tbl'];
                                        // list($y,$m,$d) = explode('-',$date);
                                ?>

                                        <tr>

                                            <td>
                                                <center><?php echo $strDate_new; ?>
                                            </td>
                                            <td style="word-wrap: break-word;"><?php echo $row['trainingCourse_tbl']; ?></td>
                                            <td>
                                                <form action="edit_traininguser.php" method="POST">
                                                    <input type="hidden" name="trainingID_tbl" value="<?php echo $row['trainingID_tbl']; ?>">
                                                    <center><button type="submit" name="edit_btn" class="btn btn-success">แก้ไข</button>
                                                </form>
                                            </td>

                                            <td>
                                                <form action="delete_traininguser.php" name="myForm" method="POST">
                                                    <input type="hidden" name="trainingID_tbl" id="trainingID_tbl" value="<?php echo $row['trainingID_tbl']; ?>">


                                                    <center><button class="btn btn-danger" name="delete_btn" type="button" onclick="validateForm(this)" value="<?php echo $row['trainingID_tbl']; ?>">ลบ</button>




                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "no record";
                                }
                                $connect->close();
                                ?>


                                <!-- echo "<tr>";
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
                        echo "</tr>"; -->



                            </tbody>
                        </table>
                </div>
</body>



<script type="text/javascript">
    function openNewTab() {
        window.open("print.php");
    }
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
                if (willDelete) {
                    document.location.href = 'delete_traininguser.php?trainingID_tbl=' + e.value;


                } else {
                    swal("ยกเลิกการลบข้อมูล", "", "error");
                }
            });
    }
</script>




<script type="text/javascript">
    $(function() {

        $("#trainingPDF_tbl").on("change", function() {
            var _fileName;
            var _maxFileSize = 2000000; // ไม่เกิน 2 MB
            var _allowFileType = ["application/pdf"]; // กำหนดชนิดไฟลที่อนุญาต
            // กำหนดข้อความ อ้างอิงค่าจาก key index ของตัวแปร _statusFileCode
            var _waringTextValue = ["กรุณาเลือกไฟล์", "ขนาดไฟล์ไม่เกิน 2 MB", "อนุญาตเฉพาะไฟล์ PDF"];

            if (window.FileReader && window.Blob) {
                // All the File APIs are supported.
                var files = $(this)[0].files;
                var _fileNameArr = [];
                var _statusFile = true;
                var _statusFileCode = 0;

                for (var i = 0; i < files.length; i++) {
                    _fileNameArr.push(files[i].name);
                    if (files[i].size > _maxFileSize) {
                        _statusFile = false;
                        _statusFileCode = 1;
                    }
                    if ($.inArray(files[i].type, _allowFileType) === -1) {
                        _statusFile = false;
                        _statusFileCode = 2;
                    }
                }
                _fileName = _fileNameArr.join(",");
                if (_fileName == "") {
                    _statusFile = false;
                }
                // ส่วนของเงื่อนไข 
                if (_statusFile == false) { // ไม่ผ่านเงื่อนไข
                    $("#trainingPDF_tbl").val("");
                    $("#trainingPDF_tbl").next("div.invalid-feedback").text(_waringTextValue[_statusFileCode]);
                } else { // ผ่านเงื่อนไข
                    $("#trainingPDF_tbl").val("ok");
                }
            } else {
                var _filePath = $(this).val();
                var _fileName = _filePath.split("\\");
                _fileName = _fileName.pop();
            }
            $(this).next("label").text(_fileName);
        });

        $("#form").on("submit", function() {
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

</html>
<script>
    $(document).ready(function() {
        $('#trainingCertificate_tbl').click(function() {
            $('#switch').show();
        });
        $('#trainingCertificate_tblh').click(function() {
            $('#switch').hide();
        });
    });
</script>
