<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["mem_id"])) {
		$mem_id = $_GET["mem_id"];
		$sql = "SELECT * FROM member
						LEFT JOIN gender
						ON member.id_gender = gender.id_gender
						LEFT JOIN title
						ON member.id_title = title.id_title
						LEFT JOIN status
						ON member.id_status = status.id_status
						WHERE member.mem_id = '$mem_id'
		";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$mem_id = $row["mem_id"];
			$mem_idcard = $row["mem_idcard"];
			$id_gender = $row["gender_name"];
			$id_title = $row["title"];
			$mem_name = $row["mem_name"];
			$mem_birthday = $row["mem_birthday"];
			$id_status = $row["status_name"];
			$mem_occupation = $row["mem_occupation"];
			$mem_address =$row["mem_address"];
			$mem_tel = $row["mem_tel"];
			$mem_email = $row["mem_email"];
			$mem_username = $row["mem_username"];
			$mem_password = $row["mem_password"];
		}else{
			$mem_id = "";
			$mem_idcard = "";
			$id_gender = "";
			$id_title = "";
			$mem_name = "";
			$mem_birthday = "";
			$id_status = "";
			$mem_occupation ="";
			$mem_address = "";
			$mem_tel = "";
			$mem_email = "";
			$mem_username = "";
			$mem_password = "";

		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลสมาชิก
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลสมาชิก</a>
            </li>
            <li class="active">
                ข้อมูลสมาชิก
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลสมาชิก
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2><?=$id_title?> <?=$mem_name?><p></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตรประชาชน</label><p><?=$mem_idcard?></p>
													<label class="col-md-5 control-label" for="id">เพศ</label><p><?=$id_gender?></p>
													<label class="col-md-5 control-label" for="id">คำนำหน้าชื่อ</label><p><?=$id_title?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุล</label><p><?=$mem_name?></p>
													<label class="col-md-5 control-label" for="id">วันเกิด</label><p><?=$mem_birthday?></p>
													<label class="col-md-5 control-label" for="id">สถานภาพ</label><p><?=$id_status?></p>
													<label class="col-md-5 control-label" for="id">อาชีพ</label><p><?=$mem_occupation?></p>
													<label class="col-md-5 control-label" for="id">ที่อยู่</label><p><?=$mem_address?></p>
													<label class="col-md-5 control-label" for="id">เบอร์โทร</label><p><?=$mem_tel?></p>
													<label class="col-md-5 control-label" for="id">อีเมล</label><p><?=$mem_email?></p>
													<label class="col-md-5 control-label" for="id">ชื่อผู้ใช้</label><p><?=$mem_username?></p>
													<label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?=$mem_password?></p>
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
  var mem_id = "<?=$mem_id?>";
  $('#test_print').click(function(){
    var view_open = window.open('member_view_print.php?mem_id=' + mem_id,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
