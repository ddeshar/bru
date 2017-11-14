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
            ข้อมูลการชำระเงินกู้และดอกเบี้ย
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">  ข้อมูลการชำระเงินกู้และดอกเบี้ย</a>
            </li>
            <li class="active">
                ข้อมูลการชำระเงินกู้และดอกเบี้ย
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลการชำระเงินกู้และดอกเบี้ย
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
															<th>รหัสการชำระ</th>
															<th>วันที่ชำระ</th>
															<th>รหัสสมาชิก</th>
															<th>ชื่อสมาชิก</th>
															<th>จำนวนเงินกู้</th>
															<th>ชำระ</th>
															<th>คงเหลือ</th>

														</tr>
													</thead>
													<tbody>
														<?php
                            if (isset($_GET["ref_id"])) {
                            $mem_id = $_GET["ref_id"];
                            $sql = "SELECT * FROM refund
                            LEFT JOIN member ON refund.mem_id = member.mem_id
                            LEFT JOIN commits ON refund.id_commit = commits.id_commit
                            WHERE refund.mem_id='$mem_id'";

                                $result = mysqli_query($link, $sql);
  															while ($row = mysqli_fetch_assoc($result)) {
																$ref_id = $row["ref_id"];
                                $ref_date = $row["ref_date"];
																$mem_id = $row["mem_id"];
																$mem_name = $row["mem_name"];
																$sub_moneyloan = $row["sub_moneyloan"];
																$pay = $row["pay"];
																$owe = $row["owe"];
                                ?>
                                    <tr>
																	 		<td><?=$ref_id?></td>
                                      <td><?=$ref_date?></td>
																			<td><?=$mem_id?></td>
																			<td><?=$mem_name?></td>
																			<td><?php echo number_format($sub_moneyloan);?></td>
																			<td><?php echo number_format($pay);?></td>
																			<td><?php echo number_format($owe);?></td>
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
                    <div class="pull-right" style="margin:10px 20px;">
                    <div class="btn-group pull-right">
                    <a href="report_refund.php"class="btn dropdown-toggle btn-custom"><span class="fa fa-reply"></span> ถอยกลับ </a>
                  <div>

                  </div>
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
</body>
</html>

<script type="text/javascript">
  var ref_id = "<?=$mem_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('refund_view_print.php?ref_id=' + ref_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
