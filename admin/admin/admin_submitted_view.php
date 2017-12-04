<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["sub_id"])) {
		$sub_id = $_GET["sub_id"];
		$sql = "SELECT * FROM submitted
						LEFT JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON submitted.id_commit = commits.id_commit
						WHERE submitted.sub_id ='$sub_id'";

						/// query left wiith one to many vallue
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$sub_id = $row["sub_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$sub_objective = $row["sub_objective"];
			$sub_date = $row["sub_date"];
			$name1 = $row["name1"];
			$name2 = $row["name2"];
			$id_commit = $row["name_commit"];
			$id_sapp = $row["status_app"];
		}else{
			$sub_id = "";
			$mem_id = "";
			$mem_name = "";
			$sub_moneyloan = "";
			$sub_objective = "";
			$sub_date = "";
			$name1 = "";
			$name2 = "";
			$id_commit = "";
			$id_sapp = "";
		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลการอนุมัติเงินกู้
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการอนุมัติเงินกู้</a>
            </li>
            <li class="active">
                ข้อมูลการอนุมัตเงินิกู้
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลการอนุมัติเงินกู้
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2><?=$mem_name?></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัสกการยื่นกู้</label><p><?=$sub_id?></p>
													<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลสมาชิก</label><p><?=$mem_name?></p>
													<label class="col-md-5 control-label" for="id">จำนวนเงินที่ขอกู้</label><p><?php echo number_format($sub_moneyloan);?> บาท</p>
													<label class="col-md-5 control-label" for="id">วัตถุประสงค์ในการขอกู้</label><p><?=$sub_objective?></p>
													<label class="col-md-5 control-label" for="id">วันที่ยื่นกู้</label><p><?=$sub_date?></p>
													<?php
														$membername1 = "SELECT member.mem_name FROM submitted INNER JOIN member ON submitted.name1 = member.mem_id WHERE member.mem_id = $name1";
														$name_mem1 = mysqli_query($link, $membername1);

														if (mysqli_num_rows($name_mem1) > 0) {
															$row = mysqli_fetch_array($name_mem1);
															$mem_name1 = $row["mem_name"];
														}else{
															$mem_name1 = "";
														}
													?>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 1</label><p><?=$mem_name1?></p>
													<?php
														$membername2 = "SELECT member.mem_name FROM submitted INNER JOIN member ON submitted.name2 = member.mem_id WHERE member.mem_id = $name2";
														$name_mem2 = mysqli_query($link, $membername2);

														if (mysqli_num_rows($name_mem2) > 0) {
															$row = mysqli_fetch_array($name_mem2);
															$mem_name2 = $row["mem_name"];
														}else{
															$mem_name2 = "";
														}
													?>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 2</label><p><?=$mem_name2?></p>
													<label class="col-md-5 control-label" for="id">ชื่อกรรมการ</label><p><?=$id_commit?></p>
													<label class="col-md-5 control-label" for="id">สถานะการกู้เงิน</label><p><?=$id_sapp?></p>
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
				<a href="approve.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
		</div>
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
</body>
</html>

<script type="text/javascript">
  var sub_id = "<?=$sub_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('submitted_view_print.php?sub_id=' + sub_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
