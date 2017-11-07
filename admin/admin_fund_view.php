<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["id_fund"])) {
		$id_fund = $_GET["id_fund"];
		$sql = "SELECT * FROM fund WHERE id_fund='$id_fund'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$id_fund = $row["id_fund"];
			$fund_name = $row["fund_name"];
			$fund_detail = $row["fund_detail"];
			$fund_money = $row["fund_money"];
		}else{
			$id_fund = "";
			$fund_name = "";
			$fund_detail = "";
			$fund_money = "";
		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลกองทุนหมู่บ้าน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลกองทุนหมู่บ้าน</a>
            </li>
            <li class="active">
                ข้อมูลกองทุนหมู่บ้าน
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลกองทุนหมู่บ้าน
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2> <?=$fund_name?><p></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัสกองทุน</label><p><?=$id_fund?></p>
													<label class="col-md-5 control-label" for="id">ชื่อกองทุน</label><p><?=$fund_name?></p>
													<label class="col-md-5 control-label" for="id">รายละเอียด</label><p><?=$fund_detail?></p>
													<label class="col-md-5 control-label" for="id">จำนวนเงิน</label><p><?=$fund_money?></p>
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
  var id_fund = "<?=$id_fund?>";
  $('#test_print').click(function(){
    var view_open = window.open('fund_view_print.php?id_fund=' + id_fund,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
