<?php
$page = 'manager';
$title = 'manager Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
require_once('include/_sdate.php');

 include ("include/fcdate.php");
$startdate= (isset($_REQUEST['startdate'])) ? $_REQUEST['startdate']: '';
$enddate= (isset($_REQUEST['enddate'])) ? $_REQUEST['enddate']: '';

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"><!-- InstanceBegin template="/Templates/admintemplate.dwt" codeOutsideHTMLIsLocked="false" --> <!--<![endif]-->

 <!-- BEGIN HEAD -->




 <aside class="right-side">
     <!-- Content Header (Page header) -->

 <section class="content">
     <!-- Second Data Table -->
     <div class="row">
         <div class="col-md-12">
             <!-- BEGIN EXAMPLE TABLE PORTLET-->
             <div class="portlet box default">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background:#fff">
                        <h3 style="color:black"><i class="fa fa-book"></i> <!-- InstanceBeginEditable name="หัวตาราง" --><center>รายงานข้อมูลการชำระเงินกู้และดอกเบี้ย</center><!-- InstanceEndEditable --></h3>
                        </div>


                       <!-- InstanceBeginEditable name="เนื้อหา" -->

                       <div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header>
                <div class="icons">
                    <i class="icon-calendar"></i>
                </div>
                <h5></h5>

                <div class="toolbar">
                    <ul class="nav pull-right">
                        <li>
                            <a href="#dateRangePickerBlock" data-toggle="collapse"
                               class="accordion-toggle minimize-box">

                            </a>
                        </li>
                        <li>
                            <a href="#" class="close-box">

                            </a>
                        </li>
                    </ul>
                </div>
            </header>

            <br>
            <form method="get">
            <div class="form-group">
              <label class="control-label col-lg-1">เริ่มต้น</label>
			<div class="col-lg-3">
            <input type="date"  name="startdate" class="form-control col-lg-6" value="<?php echo $startdate; ?>" />
                </div>
           <div class="form-group">
              <label class="control-label col-lg-1">สิ้นสุด</label>
			<div class="col-lg-3">
            <input type="date" name="enddate" class="form-control col-lg-6" value="<?php echo $enddate; ?>" />
             </div>
               <div class="form-actions no-margin-bottom">
          <input type="submit" value="ตกลง" class="btn btn-success"/>
                                 </div>
             </div>
             </div>
             </form>


			<div class="panel-body">
        <div id="sample_editable_1_wrapper" class="">
            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                    <thead bgcolor="#fff" class="style3">
                                        <tr>
                                              <th><center>No.</center></th>
                                               <th><center>วันที่รับชำระ</center></th>
                                               <th>ชื่อ-สกุล</th>
                                               <th><div align='right'>เงินต้นและดอกเบี้ย</div></th>
                                               <th><div align='right'>เงินที่ชำระ</div></th>



                                        </tr>
                                    </thead>

                                    <tbody>

<?php
$i=1;
if (isset($_GET["ref_id"])) {
    								$ref_id = $_GET["ref_id"];
    								$sql = "DELETE FROM refund WHERE ref_id='$ref_id'";
    								$result = mysqli_query($link, $sql);
							}

                  $sql = "SELECT refund.ref_id,
                  refund.mem_id,
                  member.mem_name,
                  refund.ref_income,
                  refund.ref_date,
                  refund.ref_rate
                  FROM refund LEFT JOIN member
                  ON refund.mem_id=member.mem_id
                  WHERE  refund.ref_date BETWEEN '$startdate' AND '$enddate'
                  GROUP BY
                  refund.ref_id";

$result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)){
                      $ref_id = $row["ref_id"];
      								$mem_id = $row["mem_id"];
      								$mem_name = $row["mem_name"];
                      $ref_income = $row["ref_income"];
                      $ref_date = $row["ref_date"];
                      $ref_rate = $row["ref_rate"];

?>
  									<tr>
                      <td><?php echo $i++;?></td>
                      <td><?php $strDate = "$ref_date";	echo DateThai($strDate);?></td>

                      <td><?=$mem_name?></td>
                      <td align="right"><?php echo number_format($ref_rate);?></td>
                      <td align="right"><?php echo number_format($ref_income);?></td>
  							</tr>
        	 <?php
			 $i++; }

			 ?>
</tbody>
</table>
</div>
</div>
</div>
<center>
<a href="report_refund_print.php?startdate=<?php echo $startdate; ?>&enddate=<?php echo $enddate;?>"><img src="asset/img/printer.png" width="100"></a>  <?php //code ปริ้น   ?>
</center>
</div>
</div>
</div>
</div><!-- InstanceEndEditable --> </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


            </div>
            <div class="row">


            </div>

            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

  </section>
  <!-- content -->
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>


<script type="text/javascript" src="asset/vendors/datatables/select2.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/pages/table-editable.js"></script>
</body>
</html>
