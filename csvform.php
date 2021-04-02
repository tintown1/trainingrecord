<?php
//include database configuration file
include 'connect.php';

//get records from database
$query = $connect->query("SELECT * FROM trainingtbl ORDER BY trainingID_tbl DESC");
$ID = $_SESSION['EmpID_tbl'];
if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "trainingtbl_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array( 'trainingEmpID_tbl', 'trainingStartDate_tbl', 'trainingEndDate_tbl', 'trainingCourse_tbl', 'trainingCategory_tbl','trainingCertificate_tbl','location_tbl');
    fputcsv($f, $fields);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $date = date("d/m/Y",strtotime($row['trainingStartDate_tbl'])); 
        $lineData = array($row['trainingEmpID_tbl'], $row['trainingStartDate_tbl'], $row['trainingEndDate_tbl'], $row['trainingCourse_tbl'], $row['trainingCategory_tbl'], $row['trainingCertificate_tbl'], $row['location_tbl']);
        fputcsv($f, $lineData);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>