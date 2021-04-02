<?php
set_time_limit(0);

 
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="training.xls"');#กำหนดชื่อไฟล์
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">';
include "connect.php";
//ทำการดึงข้อมูลจาก Database
//Connect DB


$id = $_REQUEST['EmpID_tbl'];

$query = "SELECT * FROM employees
                    JOIN trainingtbl
                    ON employees.EmpID_tbl = trainingtbl.trainingEmpID_tbl
                    JOIN category
                    ON category.CategoryName_tbl = trainingtbl.trainingCategory_tbl
                    WHERE employees.EmpID_tbl = '".$id."'";
// $query = "SELECT * FROM trainingtbl,employees,category,certificate
// where employees.EmpID_tbl = trainingtbl.trainingEmpID_tbl
// and category.categoryID_tbl = trainingtbl.trainingCategory_tbl 
// and certificate.certificateID = trainingtbl.trainingCertificate_tbl";
$res = mysqli_query($connect,$query);
mysqli_close($connect);
echo '<table style="width:100%" x:str>';
while($row = $res->fetch_array()){
    echo '<tr>
    <td>'.$row['trainingEmpID_tbl'].'</td>
    <td>'.$row['trainingStartDate_tbl'].'</td>
    <td>'.$row['trainingEndDate_tbl'].'</td>
    <td>'.$row['trainingCourse_tbl'].'</td>
    <td>'.$row['trainingCategory_tbl'].'</td>
    <td>'.$row['trainingCertificate_tbl'].'</td>
    <td>'.$row['location_tbl'].'</td>

            </tr>';
}
echo '</table>';
header('Content-Type: text/html; charset=utf-8');

?>