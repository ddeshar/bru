<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
require_once('include/_sdate.php');

if (isset($s_login_mem_id)) {
		// $pro_id = $_GET["pro_id"];
		$sql = "SELECT * FROM promise
						LEFT JOIN member ON promise.mem_id = member.mem_id
						LEFT JOIN statusb_app ON promise.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON promise.id_commit = commits.id_commit
						WHERE member.mem_id ='$s_login_mem_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pro_id = $row["pro_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			//$sub_id = $row["sub_id"];
			$app_pice = $row["app_pice"];
			$sub_date = $row["sub_date"];
			$pro_date = $row["pro_date"];
			//$pro_number = $row["pro_number"];
			$sub_moneyloan = $row["sub_moneyloan"];
			// $sub_idcardBM1 = $row["sub_idcardBM1"];
			// $sub_idcardBM2 = $row["sub_idcardBM2"];
			$name1 = $row["name1"];
			$name2 = $row["name2"];
			$pro_redate = $row["pro_redate"];
			$id_commit = $row["name_commit"];
			$id_sapp = $row["id_sapp"];
		}else{
			$pro_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			//$sub_id = "";
			$app_pice = "";
			$sub_date = "";
			$pro_date = "";
			//$pro_number = "";
			$sub_moneyloan = "";
			// $sub_idcardBM1 = "";
			// $sub_idcardBM2 = "";
			$name1 = "";
			$name2 = "";
			$pro_redate = "";
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
          ข้อมูลการการทำสัญญากู้เงิน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการการทำสัญญากู้เงินกู้</a>
            </li>
            <li class="active">
                ข้อมูลการการทำสัญญากู้เงิน
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลการการทำสัญญากู้เงิน
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2><?=$mem_name?><p></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัสการทำสัญญา</label><p><?=$pro_id?></p>
													<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลสมาชิก</label><p><?=$mem_name?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตรประจำตัวประชาชาชน</label><p><?=$mem_idcard?></p>
													<!-- <label class="col-md-5 control-label" for="id">รหัสการอนุมัติ</label><p><?//=$sub_id?></p> -->
													<label class="col-md-5 control-label" for="id">จำนวนเงินที่อนุมัติ</label><p><?php echo number_format($app_pice);?> บาท</p>
													<label class="col-md-5 control-label" for="id">วันที่อนุมัติ</label><p><?php $strDate = "$sub_date";	echo DateThai($strDate);?></p>
													<label class="col-md-5 control-label" for="id">วันที่ทำสัญญา</label><p><?php $strDate = "$pro_date";	echo DateThai($strDate);?></p>
													<!-- <label class="col-md-5 control-label" for="id">เลขทีสัญญา</label><p><?//=$pro_number?></p> -->
													<label class="col-md-5 control-label" for="id">จำนวนเงินกู้</label><p><?php echo number_format($sub_moneyloan);?> บาท</p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 1</label><p><?=$name1?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 2</label><p><?=$name2?></p>
													<label class="col-md-5 control-label" for="id">วันครบกำหนดส่ง</label><p><?php $strDate = "$pro_redate";	echo DateThai($strDate);?></p>
													<label class="col-md-5 control-label" for="id">ชื่อกรรมการ</label><p><?=$id_commit?></p>

										</div>

                </div>
            </div>
        </div>
				<div align='center' class="error-actions">
    				<a href="promise.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
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
