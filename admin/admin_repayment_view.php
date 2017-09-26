<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["pro_id"])) {
		$pro_id = $_GET["pro_id"];
		$sql = "SELECT * FROM promise
						LEFT JOIN member ON promise.mem_id = member.mem_id
						LEFT JOIN statusb_app ON promise.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON promise.id_commit = commits.id_commit
						WHERE pro_id='$pro_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pro_id = $row["pro_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			$sub_id = $row["sub_id"];
			$app_pice = $row["app_pice"];
			$sub_date = $row["sub_date"];
			$pro_date = $row["pro_date"];
			$pro_number = $row["pro_number"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$sub_idcardBM1 = $row["sub_idcardBM1"];
			$sub_idcardBM2 = $row["sub_idcardBM2"];
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
			$sub_id = "";
			$app_pice = "";
			$sub_date = "";
			$pro_date = "";
			$pro_number = "";
			$sub_moneyloan = "";
			$sub_idcardBM1 = "";
			$sub_idcardBM2 = "";
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
            <div class="panel panel-info">
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
													<label class="col-md-5 control-label" for="id">รหัสกการการทำสัญญา</label><p><?=$pro_id?></p>
													<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลสมาชิก</label><p><?=$mem_name?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตรประจำตัวประชาชาชน</label><p><?=$mem_idcard?></p>
													<label class="col-md-5 control-label" for="id">รหัสการอนุมัติ</label><p><?=$sub_id?></p>
													<label class="col-md-5 control-label" for="id">จำนวนเงินที่อนุมัติ</label><p><?=$app_pice?></p>
													<label class="col-md-5 control-label" for="id">วันที่อนุมัติ</label><p><?=$sub_date?></p>
													<label class="col-md-5 control-label" for="id">วันที่ทำสัญญา</label><p><?=$pro_date?></p>
													<label class="col-md-5 control-label" for="id">เลขทีสัญญา</label><p><?=$pro_number?></p>
													<label class="col-md-5 control-label" for="id">จำนวนเงินกู้</label><p><?=$sub_moneyloan?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 1</label><p><?=$sub_idcardBM1?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 1</label><p><?=$name1?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 1</label><p><?=$sub_idcardBM2?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 2</label><p><?=$name2?></p>
													<label class="col-md-5 control-label" for="id">วันครบกำหนดส่ง</label><p><?=$pro_redate?></p>
													<label class="col-md-5 control-label" for="id">ชื่อกรรมการ</label><p><?=$id_commit?></p>

										</div>
                    <div class="pull-right" style="margin:10px 20px;">
                        <button type="button" class="btn btn-responsive button-alignment btn-info" data-toggle="button">
                        <a style="color:#fff;" onclick="javascript:window.print();">Print<i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i></a>
                        </button>
                        <button type="button" class="btn btn-responsive button-alignment btn-warning" data-toggle="button">
                        <a style="color:#fff;">Submit Your Invoice<i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i></a>
                        </button>
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
