<?php 
include "connect.php"; 
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>upload</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
 
<body>

<?php include('home_member.php'); ?>
<link rel ="stylesheet" type="text/css" href="style2.css">

<div class="container fonts" style="margin-top:10px;">
<div class="text" style="padding-left:10px; margin-top:20px;">
    
<br>
<br>

        <form action="savecsv.php" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div><center>
                <label>UPLOAD CSV FILE</label> 

                    
                    <input type="file" name="file"
                    id="file" accept=".csv" class="btn btn-primary">
                    


                <button type="submit" id="import" name="import"
                class="btn btn-primary">Import</button>
                </center>
            </div>
        
        </form>
        <?php
        include('includes/scripts.php'); 
        ?>
        <script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>

