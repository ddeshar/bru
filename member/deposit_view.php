<?php
$page = 'Member';
$title = 'Hello Member';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
require_once('include/_date.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลการฝาก-ถอนเงินสัจจะออมทรัพย์
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการสัจจะออมทรัพย์</a>
            </li>
            <li class="active">
                ข้อมูลการสัจจะออมทรัพย์
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายละเอียดข้อมูลการฝากและถอนเงินสัจจะออมทรัพย์
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-12">
											<table class="table table-striped">
													<thead>
														<tr>
															<th>รหัสการฝาก</th>
															<th>วันที่ฝาก</th>
															<th>รหัสสมาชิก</th>
															<th>ชื่อผู้ฝาก</th>
															<th>ชื่อผู้รับฝาก</th>
															<th>เงินฝาก</th>
															<th>ถอน</th>
															<th>ยอดเงินคงเหลือ</th>
														</tr>
													</thead>
													<tbody>
														<?php
														if (isset($s_login_mem_id)) {
                               		 $mem_id = @$_GET["mem_id"];
																$sql = "SELECT DISTINCT deposit.mem_id,
																member.mem_name,
																deposit.fak_id,
																deposit.fak_date,
																deposit.fak_sum,
																deposit.withdraw,
																deposit.fak_total,
																commits.name_commit
																FROM deposit LEFT JOIN member ON deposit.mem_id = member.mem_id
																LEFT JOIN commits ON deposit.id_commit = commits.id_commit WHERE deposit.mem_id = '$s_login_mem_id' ORDER BY fak_id asc";
																$result = mysqli_query($link, $sql);
																while ($row = mysqli_fetch_array($result)) {
																	$fak_id = $row["fak_id"];
																	$fak_date = $row["fak_date"];
																	$mem_id = $row["mem_id"];
																	$name_commit = $row["name_commit"];
																	$fak_sum = $row["fak_sum"];
																	$withdraw = $row["withdraw"];
																	$fak_total = $row["fak_total"];
																	$mem_name = $row["mem_name"];
																	?>
																	<tr>
																	 		<td><?=$fak_id?></td>
																			<td><?php $strDate = "$fak_date";	echo DateThai($strDate);?></td>
																			<td><?=$mem_id?></td>
																			<td><?=$mem_name?></td>
																			<td><?=$name_commit?></td>
																			<td align='center'><?php echo number_format($fak_sum);?></td>
																			<td align='center'><?php echo number_format($withdraw);?></td>
																			<td align='center'><?php echo number_format($fak_total);?></td>
																	</tr>
																	<?php
																}
															}
														 ?>
														<tr>
													</tbody>
											</table>
										</div>

                </div>
            </div>
        </div>
    </section>
</aside>
<?php
require_once('include/_footer.php');
?>
<script type="text/javascript" src="asset/vendors/datatables/select2.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/pages/table-editable.js"></script>
</body>
</html>
