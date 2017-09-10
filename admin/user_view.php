<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["user_id"])) {
		$user_id = $_GET["user_id"];
		$sql = "SELECT * FROM tbl_users WHERE user_id='$user_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$user_id = $row["user_id"];
			$username = $row["username"];
			$password = $row["password"];
			$email = $row["email"];
			$status = $row["status"];
		}else{
			$user_id = "";
			$username = "";
			$password = "";
			$email = "";
			$status = "";
		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลผู้เข้าใช้งาน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลผู้เข้าใช้งาน</a>
            </li>
            <li class="active">
                ข้อมูลผู้เข้าใช้งาน
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลผู้เข้าใช้งาน
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2> <?=$username?><p></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัส</label><p><?=$user_id?></p>
													<label class="col-md-5 control-label" for="id">ชื่อผู้ใช้</label><p><?=$username?></p>
													<!-- ไม่ควรแสดงรหัวผ่าน -->
													<!-- <label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?//$password?></p> -->
													<label class="col-md-5 control-label" for="id">อีเมล</label><p><?=$email?></p>
													<label class="col-md-5 control-label" for="id">สถานะ</label><p><?=$status?></p>
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
