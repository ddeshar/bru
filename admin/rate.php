<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          ข้อมูลสมาชิกที่ชำระเงินกู้แล้ว
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">
              ข้อมูลสมาชิกที่ชำระเงินกู้แล้ว
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption"> <i class="livicon" data-name="table" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                          ตารางข้อมูลสมาชิกที่ชำระเงินกู้แล้ว
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">

                            </div>
                            <div class="btn-group pull-right">

                            </div>
                        </div>

                            <div id="sample_editable_1_wrapper" class="">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th><center>No.</center></th>
                                            <th><center>วันที่รับชำระ</center></th>
                                            <th>รหัสการรับชำระ</th>
                                            <th>รหัสสมาชิก</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th><div align='right'>เงินต้นและดอกเบี้ย</div></th>
                                            <th><div align='right'>เงินที่ชำระ</div></th>
                                            <th><center>ดูข้อมูล</center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
    						<?php $i=1;
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
                  ON refund.mem_id=member.mem_id";
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
                        <td align="center"><?=$ref_date?></td>
    										<td><?=$ref_id?></td>
    										<td><?=$mem_id?></td>
    										<td><?=$mem_name?></td>
                        <td align="right"><?php echo number_format($ref_rate);?></td>
                        <td align="right"><?php echo number_format($ref_income);?></td>

                        <td align='center'><a href='admin_refund_view.php?ref_id=<?=$mem_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a> |
                        <a href='refund_pdf.php?ref_id=<?=$ref_date?>' class='btn warning btn-xs purple' target="_blank"><i class='fa fa-print'></i></a></td>
    									</tr>
                      <?php
    							}
    						?>
    					</tbody>
                                </table>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET--> </div>
                    </div>
                </div>
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
