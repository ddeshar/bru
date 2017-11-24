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
          ข้อมูลสมาชิกที่กู้เงินกองทุน
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
              ข้อมูลสมาชิกที่กู้เงินกองทุน
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box default">

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                              <!-- <a href="admin_refunds_add.php"   class=" btn btn-custom">
                                  ชำระเงิน
                                    <i class="fa fa-plus"></i>
                                </button> </a> -->
                            </div>


                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">

                                        <th>ลำดับที่</th>
                                        <th>รหัสการจ่ายเงิน</th>
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th><div align='right'>เงินต้น</div></th>
                                        <!-- <th><center>วันที่รับชำระ</center></th> -->
                                        <th><center>ดูข้อมูล</center></th>

                                    </tr>
                                </thead>
                                <tbody>
						<?php $i=1;
							if (isset($_GET["pay_id"])) {
								$pay_id = $_GET["pay_id"];
								// $sql = "DELETE FROM refund WHERE ref_id='$ref_id'";
								$result = mysqli_query($link, $sql);
							}

							$sql = "SELECT * FROM `repayment`";
							$result = mysqli_query($link, $sql);
							while ($row = mysqli_fetch_array($result)){
								$pay_id = $row["pay_id"];
								$mem_id = $row["mem_id"];
								$mem_name = $row["mem_name"];
                $pay_pice = $row["pay_pice"];
?>
                <tr>
                  <td><?php echo $i++;?></td>
										<td><?=$pay_id?></td>
										<td><?=$mem_id?></td>
										<td><?=$mem_name?></td>
                    <td align="right"><?php echo number_format($pay_pice);?></td>
                    <!-- <td align="center"><?//=$ref_date?></td> -->

                    <td align='center'><a href='admin_repayment_view.php?pay_id=<?=$pay_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a></td>
                    <!-- <a href='refund_pdf.php?pay_id=<?//=$ref_date?>' class='btn warning btn-xs purple' target="_blank"><i class='fa fa-print'></i></a></td> -->
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
