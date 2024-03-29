<?php
$page = 'Member';
$title = 'Member Page';
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
          ข้อมูลการชำระเงินและดอกเบี้ย
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ชำระเงินและดอกเบี้ย</a>
            </li>
            <li class="active">
              ข้อมูลการชำระเงินและดอกเบี้ย
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
              <div class="portlet box success">
                  <div class="portlet-title">
                      <div class="caption"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        ตารางข้อมูลการชำระเงินและดอกเบี้ย
                      </div>
                  </div>
                <div class="portlet box default">
                    <div class="portlet-body">
                        <div class="table-toolbar">

                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>รหัสการรับชำระ</th>
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>รวมเงินที่คืนทั้งหมด</th>
                                        <th>วันที่รับชำระ</th>
                                        <th><center>ดูข้อมูล</center></th>
                                    </tr>
                                </thead>
                                <tbody>
						<?php
							// if (isset($_GET["ref_id"])) {
							// 	$ref_id = $_GET["ref_id"];
							// 	$sql = "DELETE FROM refund WHERE ref_id='$ref_id'";
							// 	$result = mysqli_query($link, $sql);
							// }
              if(isset($s_login_mem_id)){
							$sql = "SELECT refund.ref_id,
              refund.mem_id,
              member.mem_name,
              refund.ref_rate,
              refund.ref_date
              FROM refund LEFT JOIN member ON refund.mem_id = member.mem_id WHERE member.mem_id = '$s_login_mem_id'";
							$result = mysqli_query($link, $sql);
							while ($row = mysqli_fetch_array($result)){
								$ref_id = $row["ref_id"];
								$mem_id = $row["mem_id"];
								$mem_name = $row["mem_name"];
                $ref_rate = $row["ref_rate"];
                $ref_date = $row["ref_date"];
                ?>
                <tr>
										<td><?=$ref_id?></td>
										<td><?=$mem_id?></td>
										<td><?=$mem_name?></td>
                    <td><?php echo number_format($ref_rate);?></td>
                    <td><?=$ref_date?></td>
                    <td align='center'><a href='refund_view.php?ref_id=<?=$mem_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a></td>
									</tr>
                  <?php
							}
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
