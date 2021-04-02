
<?php


set_time_limit(0);
header('Content-Type: text/html; charset=utf-8');
 
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="training.xls"');#กำหนดชื่อไฟล์
echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">';
include "connect.php";
// $sql = "SELECT * FROM trainingtbl,employees,category
//                 where employees.trainingID_tbl = trainingtbl.trainingID_tbl
//                  and category.categoryID_tbl = trainingtbl.trainingID_tbl ";
//  $result = $connect->query($sql);


//ทำการดึงข้อมูลจาก Database
//Connect DB
$ID = $_SESSION['EmpID_tbl'];
 
$query = "SELECT * FROM employees emp
JOIN trainingtbl tn
ON emp.EmpID_tbl = tn.trainingEmpID_tbl
JOIN category c
ON c.CategoryID_tbl = tn.trainingCategory_tbl

WHERE emp.EmpID_tbl = '".$ID."'";
$res = $connect->query($query);
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
?>