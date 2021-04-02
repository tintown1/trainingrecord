<?php
include "connect.php";
$sql = "SELECT * FROM employees,department
where department.EmpID_tbl = employees.EmpID_tbl";
$result = $connect->query($sql);
$ID = $_SESSION['EmpID_tbl'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>รายชื่อผู้ใช้</title>

    <!-- นำเข้า  CSS จาก Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <!-- นำเข้า  CSS จาก dataTables -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

    <!-- นำเข้า  Javascript จาก  Jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- นำเข้า  Javascript  จาก   dataTables -->
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #33B5FF;
  color: white;
}
</style>
</head>

<body>
    
    <div class="container">
    
        <h1>จัดการข้อมูลพนักงาน</h1>
        
        <table class="table table-info" id="example">
            <thead>
                <tr class="info">
                    
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>วันเริ่มงาน</th>
                    <th>สังกัด</th>
                    <th>อีเมลล์</th>
                    
                    
                    <th>แก้ไขข้อมูลพนักงาน</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employees
                                JOIN department
                                ON employees.Empdepartment_tbl = department.departmentID_tbl
                                WHERE employees.EmpID_tbl = '".$ID."'";
           
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $date =  $row['EmpStartDate_tbl'];
                      list($y,$m,$d) = explode('-',$date);
                        echo "<tr>";
                        //echo "<td>" . $row["EmpID_tbl"] . "</td>";
                        echo "<td>" . $row["EmpFirstName_tbl"] . "</td>";
                        echo "<td>" . $row["EmpLastName_tbl"] . "</td>";
                        echo "<td>" . $d.'/'.$m.'/'.$y . "</td>";
                        echo "<td>" . $row["departmentName_tbl"] . "</td>";
                        echo "<td>" . $row["EmpEmail_tbl"] . "</td>";
                        
                        //echo "<td>" . $row["EmpPassword_tbl"] . "</td>";
                        echo '<td><button><a href="edit_employeesuser.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . 'แก้ไขข้อมูลพนักงาน' . '</a></button></td>';
                        
                        //echo "<td><button><a onClick=\"javascript: return confirm('Please confirm deletion');\" href='delete_employeesuser.php?EmpID_tbl=".$row['EmpID_tbl']."'>ลบ</a></button></td>";
                        //echo '<td><button><a href="insert_training.php?EmpID_tbl=' . $row['EmpID_tbl'] . '">' . 'เพิ่มอบรม' . '</a></button></td>';
                        echo "</tr>";
                    }
                }
                $connect->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>