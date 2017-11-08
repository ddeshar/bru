<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["pay_id"])) {
		$pay_id = $_GET["pay_id"];
		$sql = "SELECT * FROM repayment
						LEFT JOIN member ON repayment.mem_id = member.mem_id
						LEFT JOIN promise ON repayment.pro_id = promise.pro_id
						LEFT JOIN commits ON repayment.id_commit = commits.id_commit
						WHERE pay_id='$pay_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pay_id = $row["pay_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			$pro_id = $row["pro_id"];
			$pro_number = $row["pro_number"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$pro_redate = $row["pro_redate"];
			$pay_date = $row["pay_date"];
			$pay_pice = $row["pay_pice"];
			$id_commit = $row["name_commit"];
		}else{
			$pay_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			$pro_id = "";
			$pro_number = "";
			$sub_moneyloan = "";
			$pro_redate = "";
			$pay_date = "";
			$pay_pice = "";
			$id_commit = "";
		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลการการจ่ายเงินให้ผู้กู้
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการการจ่ายเงินให้ผู้กู้</a>
            </li>
            <li class="active">
                ข้อมูลการการจ่ายเงินให้ผู้กู้
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลการจ่ายเงินให้ผู้กู้
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
													<label class="col-md-5 control-label" for="id">รหัสการจ่ายเงินให้ผู้กู้</label><p><?=$pay_id?></p>
													<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุลสมาชิก</label><p><?=$mem_name?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตรประจำตัวประชาชาชน</label><p><?=$mem_idcard?></p>
													<label class="col-md-5 control-label" for="id">รหัสการทำสัญญา</label><p><?=$pro_id?></p>
													<!-- <label class="col-md-5 control-label" for="id">เลขที่สัญญา</label><p><?//=$pro_number?></p> -->
													<label class="col-md-5 control-label" for="id">จำนวนเงินกู้</label><p><?=$sub_moneyloan?></p>
													<label class="col-md-5 control-label" for="id">วันที่ครบกำหนดส่ง</label><p><?=$pro_redate?></p>
													<label class="col-md-5 control-label" for="id">วันที่จ่ายเงินกู้</label><p><?=$pay_date?></p>
													<label class="col-md-5 control-label" for="id">จำนวนเงินที่จ่าย</label><p><?=$pay_pice?></p>
													<label class="col-md-5 control-label" for="id">ชื่อกรรมการ</label><p><?=$id_commit?></p>

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
    <!-- content -->
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
</body>
</html>

<script type="text/javascript">
  var pay_id = "<?=$pay_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('repayment_view_print.php?pay_id=' + pay_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>