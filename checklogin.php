<?php 
// session_start();
        if(isset($_POST['username'])){
                  include("connect.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM employees 
                  WHERE  EmpEmail_tbl='".$username."' 
                  AND  EmpPassword_tbl='".$password."' ";
                  $result = mysqli_query($connect,$sql);
				
                  if(mysqli_num_rows($result) > 0){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["EmpID_tbl"] = $row["EmpID_tbl"];
                      $_SESSION["EmpFirstName_tbl"] = $row["EmpFirstName_tbl"];
                      $_SESSION["EmpLv"] = $row["EmpLv"];
                      $_SESSION["EmpStatus_tbl"] = $row["EmpStatus_tbl"];

                      if($_SESSION["EmpLv"]=="Admin"){
                        if($_SESSION["EmpStatus_tbl"] == 1){ 
                        Header("Location: admin.php");
                        }
                        else{
                          echo "<script>";
                          echo "alert(\" ยังไม่ยืนยันสถานะ\");"; 
                          echo "window.history.back()";
                          echo "</script>";
                        }    
                      }
                                                           
                      if($_SESSION["EmpLv"]=="Member"){                        
                      
                        if($_SESSION["EmpStatus_tbl"] == 1){
                        Header("Location: member.php");
                        }
                        else{
                          echo "<script>";
                          echo "alert(\" ยังไม่ยืนยันสถานะ\");"; 
                          echo "window.history.back()";
                          echo "</script>";
                        }  
                      }
                    }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                      }
                    }
                    else{

                      Header("Location: index.php"); //user & password incorrect back to login again
 
                      }
      
?>