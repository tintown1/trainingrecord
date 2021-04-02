<tr>
<div class="form-group">
<td><label>ID</label></td>
   <td><input class="form-control" data-validation="required" disabled='disabled' type="text" name="trainingID_tbl" placeholder="id" value="<?php echo $row['trainingID_tbl'];?>" >
   <input class="form-control" data-validation="required" type="hidden" name="trainingID_tbl" placeholder="id" value="<?php echo $row['trainingID_tbl'];?>" ></td>
    <div class="col-sm-9">
</tr>
</div>
</div>

<tr>
<div class="form-group">
    <td><label>ชื่อ</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="text" name="EmpFirstName"  disabled='disabled' placeholder="ชื่อ" value="<?php echo $row['EmpFirstName_tbl'];?>" ></td>
    
</div>
 </div>
</tr>

<tr>
<div class="form-group">
    <td><label>นามสกุล</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="text" name="EmpLastName_tbl"  disabled='disabled' placeholder="นามสกุล" value="<?php echo $row['EmpLastName_tbl'];?>" ></td>
    
</div>
 </div>
</tr>

<tr>
<div class="form-group">
    <td><label>วันเริ่มงาน</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="date" name="trainingStartDate_tbl" placeholder="วันเริ่มงาน" value="<?php echo $row['trainingStartDate_tbl'];?>" ></td>
    
    </div>
 </div>
</tr>
<tr>
<div class="form-group">
    <td><label>สิ้นสุด</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="date" name="trainingEndDate_tbl" placeholder="วันเริ่มงาน" value="<?php echo $row['trainingEndDate_tbl'];?>" ></td>
    
    </div>
 </div>
</tr>
<tr>
<div class="form-group">
    <td><label>หลักสูตร</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="text" name="trainingCourse_tbl" placeholder="วันเริ่มงาน" value="<?php echo $row['trainingCourse_tbl'];?>" ></td>
    
    </div>
 </div>
</tr>

<tr>
<div class="form-group">
    <td><label>ประเภท</label></td>
<div class="col-sm-9">
    <td>
    
    <?php 
	                $select_data = "SELECT * FROM category" 
			        or die ("Error : ".mysqlierror($select_data));
                    $rs_select = mysqli_query($connect, $select_data);
                //echo ($query_level);//test query
	                ?>
    					<select class="form-control select2" name="CategoryID_tbl" required>
    					  <option  value="">--เลือก--</option>
                          
    					  <?php foreach ($rs_select as $rs) {?>
                        <option value="<?php echo $rs['CategoryID_tbl'];?>"<?=$row['CategoryID_tbl'] == $rs['CategoryID_tbl'] ? ' selected="selected"' : '';?>>
                        <?php echo $rs['CategoryName_tbl'];?>
                        </option>
    					  <?php }?>
                          
                         
						</select>		
                        <div class="invalid-feedback">
        กรุณาเลือกประเภท
      </div> 
    </td>

    </div>
 </div>
</tr>

<tr>
<div class="form-group">
    <td><label>สถานที่</label></td>
<div class="col-sm-9">
    <td><input class="form-control" data-validation="required" type="text" name="location_tbl" placeholder="สถานที่" value="<?php echo $row['location_tbl'];?>" ></td>

    </div>
 </div>
</tr>
<tr>
<div class="form-group">
    <td><label>ประกาศนียบัตร</label></td>
<div class="col-sm-9">
    <td>
    <?php 
	                $select_data = "SELECT * FROM certificate" 
			        or die ("Error : ".mysqlierror($select_data));
                    $rs_select = mysqli_query($connect, $select_data);
                //echo ($query_level);//test query
	                ?>
    					<select class="form-control select2" name="certificateID" required>
    					  <option  value="">--เลือก--</option>
    					  <?php foreach ($rs_select as $rs) {?>
                            <option value="<?php echo $rs['certificateID'];?>"<?=$row['certificateID'] == $rs['certificateID'] ? ' selected="selected"' : '';?>>
                            <?php echo $rs['certificateName'];?>
                            </option>
    					  <?php }?>
                          
						</select>	
                        <div class="invalid-feedback">
        กรุณาเลือกประเภท
      </div> 
                        </td>
    </div>
 </div>
</tr>
<!-- <tr>
<div class="form-group">
   <td><label>ประกาศณียบัตร</label></td>
<div class="col-sm-9">

    <td><input type="radio" id="trainingCertificate_tbl" name="trainingCertificate_tbl" value="มี"><label for="มี">มี</label>
    <input type="radio" id="trainingCertificate_tbl" name="trainingCertificate_tbl" value="ไม่มี"><label for="ไม่มี">ไม่มี</label></td>
    </div>
 </div>
</tr> -->
<div class="form-group">
<td><label>อัพโหลด PDF</label></td>
<div class="col-sm-9">
    <td><input type="file" id="trainingPDF_tbl"name="trainingPDF_tbl" accept=".pdf,.csv" required><div class="invalid-feedback">
        กรุณาเลือกไฟล์
      </div> </td>
</tr>
<tr>  
</tr>

</table>
    <input class="btn btn-outline-primary" name="submit" type="submit" value="บันทึกการแก้ไข" >
    </form>