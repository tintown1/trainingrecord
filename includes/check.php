<script src="js/sweetalert.min.js"></script>
<?php
 if(isset($_SESSION['status']) && $_SESSION['status'] !='')
 {
   ?>
<script>
swal({
  title: "อีเมลซ้ำ กรุณากรอกไหม่ !",
  // text: "You clicked the button!",
  icon: "error",
  button: "OK,done",
});
</script>
<?php
  unset($_SESSION['status']);
  
 }
 ?>

