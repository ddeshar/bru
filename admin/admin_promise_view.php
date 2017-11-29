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
		$pro_ids = $_GET["pro_id"];
		$sql = "SELECT * FROM promise
						LEFT JOIN member ON promise.mem_id = member.mem_id
						LEFT JOIN statusb_app ON promise.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON promise.id_commit = commits.id_commit
						WHERE pro_id='$pro_ids'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pro_id = $row["pro_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			$app_pice = $row["app_pice"];
			$sub_date = $row["sub_date"];
			$pro_date = $row["pro_date"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$name1 = $row["name1"];
			$name2 = $row["name2"];
			$pro_redate = $row["pro_redate"];
			$id_commit = $row["name_commit"];
			$id_sapp = $row["id_sapp"];
			$pro_Document =$row["pro_Document"];
		}else{
			$pro_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			$app_pice = "";
			$sub_date = "";
			$pro_date = "";
			$sub_moneyloan = "";
			$name1 = "";
			$name2 = "";
			$pro_redate = "";
			$id_commit = "";
			$id_sapp = "";
			$pro_Document = "";
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
						<div class="col-md-6">
							<div class="container">
								<h2><?=$mem_name?><p></h2>
							</div>
								<label class="col-md-5 control-label" for="id">รหัสการทำสัญญา</label><p><?=$pro_id?></p>
								<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
								<label class="col-md-5 control-label" for="id">ชื่อ-สกุลสมาชิก</label><p><?=$mem_name?></p>
								<label class="col-md-5 control-label" for="id">เลขที่บัตรประจำตัวประชาชาชน</label><p><?=$mem_idcard?></p>
								<label class="col-md-5 control-label" for="id">จำนวนเงินที่อนุมัติ</label><p><?php echo number_format($app_pice);?> บาท</p>
								<label class="col-md-5 control-label" for="id">วันที่อนุมัติ</label><p><?=$sub_date?></p>
								<label class="col-md-5 control-label" for="id">วันที่ทำสัญญา</label><p><?=$pro_date?></p>
								<label class="col-md-5 control-label" for="id">จำนวนเงินกู้</label><p><?php echo number_format($sub_moneyloan);?> บาท</p>
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
									$membername2 = "SELECT member.mem_name FROM submitted INNER JOIN member ON submitted.name1 = member.mem_id WHERE member.mem_id = $name2";
									$name_mem2 = mysqli_query($link, $membername2);

									if (mysqli_num_rows($name_mem2) > 0) {
										$row = mysqli_fetch_array($name_mem1);
										$mem_name2 = $row["mem_name"];
									}else{
										$mem_name2 = "";
									}						
								?>
								<label class="col-md-5 control-label" for="id">ชื่อ-สกุลผู้ค้ำคนที่ 2</label><p><?=$mem_name2?></p>
								<label class="col-md-5 control-label" for="id">วันครบกำหนดส่ง</label><p><?=$pro_redate?></p>
								<label class="col-md-5 control-label" for="id">ชื่อกรรมการ</label><p><?=$id_commit?></p>
								<label class="col-md-5 control-label" for="id"><a href="asset/uploads/<?=$pro_Document?>">Download</a></label>
						</div>
						<div class="col-md-6">
							<iframe src="asset/uploads/<?=$pro_Document?>" width="100%" height="500px">
								<p>Your browser does not support iframes.</p>
							</iframe>
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
    	</section>
		<div align='center' class="error-actions">
				<a href="repayment.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
		</div>
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
</body>
</html>

<script type="text/javascript">
  var pro_id = "<?=$pro_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('promise_view_print.php?pro_id=' + pro_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
