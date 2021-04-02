<?php
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
    $thai_date_return.= " เวลา ".date("H:i:s",$time);
    return $thai_date_return;   
} 
function mydate($strDate){
    list($Y,$m,$d) = explode("-",$strDate); // แยกข้อความด้วยตัวแบ่ง
    $Y = $Y-543; // จัดรูปแบบปีเป็น ค.ศ. ลบ 543
    $m = sprintf("%'.02d",$m); // จัดรูปแบบเดือน 00
    $d = sprintf("%'.02d",$d); // จัดรูปแบบวัน 00
    $strDate_new = implode("-",array($Y,$m,$d));
    // $strDate_new = "$Y-$m-$d"; // แบบนี้ก็ได้
    return $strDate_new; // ตัวแปรที่ส่งค่ากลับ   
}
?>
<?php
//////////// การใช้งาน
$my_strDate="2560-3-8";
$strDate=mydate($my_strDate);
echo thai_date_and_time(strtotime($strDate)); // 8 มีนาคม 2560 เวลา 10:10:43
?>