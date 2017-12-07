<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_GET["id_committee"])) {
		$id_committee = $_GET["id_committee"];
		$sql = "SELECT * FROM committee
		LEFT JOIN title
		ON committee.id_title = title.id_title
		LEFT JOIN position
		ON committee.id_position = position.id_position
		WHERE id_committee='$id_committee'
		 ";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$id_committee = $row["id_committee"];
			$com_idcard = $row["com_idcard"];
			$id_title = $row["title"];
			$com_name = $row["com_name"];
			$id_position = $row["name_position"];
			$com_birthday = $row["com_birthday"];
			$com_address = $row["com_address"];
			$com_tel = $row["com_tel"];
			// $com_username = $row["com_username"];
			// $com_password = $row["com_password"];
		}else{
			$id_committee = "";
			$com_idcard = "";
			$id_title = "";
			$com_name = "";
			$id_position = "";
			$com_birthday = "";
			$com_address = "";
			$com_tel = "";
			// $com_username = "";
			// $com_password = "";
		}
	}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
          ข้อมูลกรรมการ
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลกรรมการ</a>
            </li>
            <li class="active">
                ข้อมูลกรรมการ
            </li>
        </ol>
    </section>
    <!--section ends-->
		<section class="content paddingleft_right15">
        <div class="row col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="credit-card" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                      รายงานรายละเอียดข้อมูลกรรมการ
                    </h3>
                </div>
                <div class="row">
									<!-- <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
												<img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
										</div> -->
										<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
												<div class="container">
													<h2><?=$id_title?> <?=$com_name?><p></h2>
												</div>
													<label class="col-md-5 control-label" for="id">รหัสกรรมการ</label><p><?=$id_committee?></p>
													<label class="col-md-5 control-label" for="id">เลขที่บัตรประชาชน</label><p><?=$com_idcard?></p>
													<label class="col-md-5 control-label" for="id">คำนำหน้าชื่อ</label><p><?=$id_title?></p>
													<label class="col-md-5 control-label" for="id">ชื่อ-สกุล</label><p><?=$com_name?></p>
													<label class="col-md-5 control-label" for="id">ตำแหน่ง</label><p><?=$id_position?></p>
													<label class="col-md-5 control-label" for="id">วันเกิด</label><p><?=$com_birthday?></p>
													<label class="col-md-5 control-label" for="id">ที่อยู่</label><p><?=$com_address?></p>
													<label class="col-md-5 control-label" for="id">เบอร์โทร</label><p><?=$com_tel?></p>
													<!-- <label class="col-md-5 control-label" for="id">ชื่อผู้ใช้</label><p><?//=$com_username?></p>
													<label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?//=$com_password?></p> -->
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
				<div align='center' class="error-actions">
						<a href="committee.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
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
  var id_committee = "<?=$id_committee?>";
  $('#test_print').click(function(){
    var view_open = window.open('committee_view_print.php?id_committee=' + id_committee,'Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
