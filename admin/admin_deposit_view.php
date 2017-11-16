<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลการฝาก
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการฝากเงินสัจจะออมทรัพย์</a>
            </li>
            <li class="active">
                ข้อมูลการฝากเงินสัจจะออมทรัพย์
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลการฝากเงินสัจจะออมทรัพย์
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
															<th><div align="right">เงินฝาก</div></th>
															<th><div align="right">ถอน</div></th>
															<th><div align="right">ยอดเงินคงเหลือ</div></th>
														</tr>
													</thead>
													<tbody>
														<?php

														if (isset($_GET["mem_id"])) {
																$mem_id = $_GET["mem_id"];
																$sql = "SELECT DISTINCT deposit.mem_id,
																member.mem_name,
																deposit.fak_id,
																deposit.fak_date,
																deposit.fak_sum,
																deposit.withdraw,
																deposit.fak_total,
																commits.name_commit
																FROM deposit LEFT JOIN member
																ON deposit.mem_id = member.mem_id
																LEFT JOIN commits
																ON deposit.id_commit = commits.id_commit WHERE deposit.mem_id = '$mem_id'
																ORDER BY deposit.fak_id asc";
																$result = mysqli_query($link, $sql);
																while ($row = mysqli_fetch_array($result)) {
																	$fak_id = $row["fak_id"];
																	$fak_date = $row["fak_date"];
																	$mem_id1 = $row["mem_id"];
																	$name_commit = $row["name_commit"];
																	$fak_sum = $row["fak_sum"];
																	$withdraw = $row["withdraw"];
																	$fak_total = $row["fak_total"];
																	$mem_name = $row["mem_name"];
?>
																	<tr>
																	 		<td><?=$fak_id?></td>
																			<td><?=$fak_date?></td>
																			<td><?=$mem_id?></td>
																			<td><?=$mem_name?></td>
																			<td><?=$name_commit?></td>
																			<td align='right'><?php echo number_format($fak_sum);?></td>
																			<td align='right'><?php echo number_format($withdraw);?></td>
																			<td align='right'><?php echo number_format($fak_total);?></td>
																	</tr>
                                  <?php
																}
															}
														 ?>
														<tr>

													</tbody>
											</table>
										</div>

                    <div class="pull-right" style="margin:10px 20px;">
                      <div class="btn-group pull-right">
                          <button id="test_print" class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                  Print
                          </button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div align='center' class="error-actions">
        <a href="deposit.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
    </div>
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
</body>
</html>
<script type="text/javascript">
  var mem_id = "<?=$mem_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('deposit_view_print.php?mem_id=' + mem_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
