<?php include('connect.php');
$i = 0;
$ID = $_SESSION['EmpID_tbl'];
//  $date1 = new DateTime('trainingStartDate_tbl');
// $date2 = new DateTime('trainingEndDate_tbl');
// $date3 = new DateTime('EmpStartDate_tbl');
// echo $date1->format('d-m-Y');
//  $date =  $row['EmpStartDate_tbl'];
//  list($y,$m,$d) = explode('-',$date);
// echo $d.'/'.$m.'/'.$y;
// echo date('Y/m/d',strtotime('2005-12-26'));

// $EmpID_tbl=isset($_GET['EmpID_tbl']) ? $_GET['EmpID_tbl']:'';
// if($EmpID_tbl!=''){
//     $sql = "SELECT * FROM employees WHERE EmpID_tbl = '".$EmpID_tbl."'";
// $sql = "SELECT * FROM employees emp
//                  JOIN trainingtbl tn
//                  ON emp.EmpID_tbl = tn.trainingEmpID_tbl
//                  JOIN category c
//                  ON tn.trainingCategory_tbl = c.CategoryID_tbl
//                  JOIN certificate cer
//                  ON tn.trainingCertificate_tbl = cer.certificateID
//                  WHERE emp.Emp_tbl = '".$ID."'";
// $sql = "SELECT * FROM library,lodetail,supplier,money,uom 
//                 where library.loh_id ='".$loh_id."' 
//                 and lodetail.loh_id = '".$loh_id."'
//                 and supplier.SupplierID = library.loh_SupplierID
//                 and money.MoneyID = lodetail.lod_money
//                 and uom.UomID = lodetail.lod_UomID ";
//     $result = $connect->query($sql);
//     $row=$result->fetch_assoc();  
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>แบบบันทึกประวัติการฝึกอบรม</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</head>
<br>
<center><img ALIGN="CENTER" width="150" height="150" src="tistr.jpg">



</center>
<br>
<center>
  <b><h1>แบบบันทึกประวัติการฝึกอบรม</h1></b>
</center>

<style type="text/css">
  @media print {
    #hid {
      display: none;
      /* ซ่อน  */
    }
  }
</style>

<body>


  <div class="container" style="margin-top:10px;">
    <div class="text-center" style="padding-left:10px; margin-top:20px;">


      <?php
      //echo "<pre>";
      //print_r($_GET);
      //echo "</pre>";
      $sql = "SELECT * FROM employees emp
      JOIN trainingtbl tn
      ON emp.EmpID_tbl = tn.trainingEmpID_tbl
      JOIN category c
      ON c.CategoryID_tbl = tn.trainingCategory_tbl
     
      JOIN department
      ON emp.Empdepartment_tbl = department.departmentID_tbl
      JOIN position
      ON emp.EmpPosition_tbl = position.p_id
      WHERE emp.EmpID_tbl = '" . $ID . "'";
      $result = $connect->query($sql);
      $row = $result->fetch_assoc();
      
      ?>


      <?php
       $strDate = $row['EmpStartDate_tbl'];
       $Y = substr($strDate,0,4);
       $Y = $Y+543;
       $m = substr($strDate,5,2);
       $d = substr($strDate,8,2);
       $strDate_new = implode("/",array($d,$m,$Y));

      //echo $d.'/'.$m.'/'.$y;
      //echo date('Y/m/d',strtotime('2005-12-26'));
      ?>

      <div class="container">

        <table border="1" width="100%" height="70%">
          <thead>
            <tr>
              <th class="text-left" nowrap>
                <font size="4">ชื่อ-สกุล : </font> 
                <font size="5" face="Cordiaupc"><?php echo $row['EmpFirstName_tbl']; ?> <?php echo $row['EmpLastName_tbl']; ?></font>
              </th>
              
              <th class="text-left" >
              <font size="4">รหัสประจำตัว : </font>
                <font size="5" face="Cordiaupc"><?php echo $row['EmpID_tbl']; ?></font>
              </th>
              <th class="text-left" nowrap>
              <font size="4">วันที่เริ่มงาน :</font> 
                <font size="5" face="Cordiaupc"><?php echo $strDate_new; ?></font>
              </th>
            </tr>
            <tr>
              <th class="text-left" rowspan="2" nowrap>
              <font size="4">ตำแหน่งงาน : </font>
                <font size="5" face="Cordiaupc"><?php echo $row['p_name']; ?></font>
              </th>
              <th class="text-left" colspan="2" nowrap>
              <font size="4">หน่วยงาน : </font>
                <font size="5" face="Cordiaupc"><?php echo $row['departmentName_tbl']; ?></font>
              </th>
            </tr>
          </thead>
          <tbody>
            </tr>


          </tbody>
          <br>
      </div>
      <div class="container">
        <table border=1 width="100%" height="70%">
          <thead>
            <tr>
              <th class="text-center" nowrap>
              <font size="4">เริ่ม</font>
              </th>
              <th class="text-center" nowrap>
              <font size="4">ถึง</font>
              </th>
              <th class="text-center" nowrap>
              <font size="4">ประเภท</font>
              </th>
              <th class="text-center" nowrap>
              <font size="4">หลักสูตร</font>
              </th>
              <th class="text-center" nowrap>
              <font size="4">สถานที่</font>
              </th>
            </tr>
          </thead>
          <tbody>
            </tr>
          </tbody>
          </tr>
          </tbody>
          <br>
      </div>

      <?php
      $sql = "SELECT * FROM employees emp
      JOIN trainingtbl tn
      ON emp.EmpID_tbl = tn.trainingEmpID_tbl
      JOIN category c
      ON c.CategoryID_tbl = tn.trainingCategory_tbl
      
      WHERE emp.EmpID_tbl = '" . $ID . "'
      ORDER BY trainingStartDate_tbl ASC";
      $result = $connect->query($sql);
      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {


          // $strDate_new1 = date_format(date_create($row['trainingStartDate_tbl']),"d/m/Y");
          // $strDate_new2 = date_format(date_create($row['trainingEndDate_tbl']),"d/m/Y");
      $strDate = $row['trainingStartDate_tbl'];
       $Y = substr($strDate,0,4);
       $Y = $Y+543;
       $m = substr($strDate,5,2);
       $d = substr($strDate,8,2);
       $strDate_new1 = implode("/",array($d,$m,$Y));

       $strDate = $row['trainingEndDate_tbl'];
       $Y = substr($strDate,0,4);
       $Y = $Y+543;
       $m = substr($strDate,5,2);
       $d = substr($strDate,8,2);
       $strDate_new2 = implode("/",array($d,$m,$Y));

          // $date1 =  $row['trainingStartDate_tbl'];
          // list($y, $m, $d) = explode('-', $date1);
          // $date2 =  $row['trainingEndDate_tbl'];
          // list($y2, $m2, $d2) = explode('-', $date2);
          echo "<tr>";
          //echo '<td ><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . '+' . '</a></button></td>';
          //echo "<td align='center'>" . $row["trainingID_tbl"] . "</td>";
          echo "<td ><center><font size='4'>" . $strDate_new1 ."</font></td>";
          echo "<td ><center><font size='4'>" . $strDate_new2 . "</font></td>";
          echo "<td ><center><font size='4'>" . $row["CategoryName_tbl"] . "</font></td>";

      ?>
          <td align="left" style="word-wrap: break-word;">
            <font size="4"> <?php echo $row['trainingCourse_tbl']; ?> </font>
          </td>
          <td align="left" style="word-wrap: break-word;">
            <font size="4"><?php echo $row['location_tbl']; ?>
          </td>
          <!-- echo "<td ALIGN = 'left'>" . $row["trainingCourse_tbl"] . "</td>";
               
                echo "<td  ALIGN = 'left'>" . $row["location_tbl"] . "</td>";
              
               //echo '<td><center><button class="buttonsec button1"><a href="edit_traininguser.php?trainingID_tbl=' . $row['trainingID_tbl'] . '">' . 'แก้ไข' . '</a></button></td>';
       
               //echo "<td><center><button class='buttonsec button2'><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_traininguser.php?trainingID_tbl=".$row['trainingID_tbl']."'>ลบ</a></button></td>";
               //echo '<td><center><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . '+' . '</a></button></td>';
               echo "</tr>"; -->
          </tr>
      <?php
        }
      }
      $connect->close();
      ?>
      </table>
      <br>
      <button id="hid" onclick="window.print();" class="btn btn-primary">
        <h3> Print </h3>
      </button>

    </div>
    <div class="col-md-2">
    </div>
  </div>
  </div>
</body>

</html>