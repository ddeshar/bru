<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
if (isset($_POST["btnEdit"])) {
		$user_id = $_POST["user_id"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$status = $_POST["status"];
		$sql = "UPDATE tbl_users SET user_id='$user_id', username='$username', password='$password', email='$email', status='$status' where user_id='$user_id'";
		//echo $sql;exit;
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('แก้ไขข้อมูลสำเร็จ');";
			echo "window.location='user.php';";
			echo "</script>";
			//header('location: admin_product.php');
		}else{
			echo "<font color='red'>SQL Error</font><hr>";
		}
	}else{
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
          แก้ไขข้อมูลผู้เข้าใช้งาน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">แก้ไขข้อมูลผู้เข้าใช้งาน</a>
            </li>
            <li class="active">
                แก้ไขข้อมูลผู้เข้าใช้งาน
            </li>
        </ol>
    </section>
    <!--section ends-->

    <section class="content">
        <!--main content-->
        <div class="row">
            <!--row starts-->
            <div class="col-lg-12">
                <!--lg-6 starts-->
                <!--basic form starts-->
                <div class="panel panel-primary" id="hidepanel1">
									<div class="panel-heading">
											<h3 class="panel-title"> <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													แก้ไขข้อมูลผู้เข้าใช้งาน
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="user_edit.php" method="post">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                <label for="id" class="col-md-3 control-label">รหัส</label>
                                <div class="col-md-3">
                                <input  name="user_id" type="text" type="text" value="<?php echo "$user_id"; ?>" class="form-control" readonly></div>
                                </div>
                                <!-- Email input-->
                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ชื่อผู้ใช้</label>
                                <div class="col-md-3">
                                <input  name="username" type="text"  value="<?php echo "$username"; ?>" class="form-control"></div>
                                </div>
                                <!-- Message body -->
                                <div class="form-group">
                                <label class="col-md-3 control-label" for="detail">รหัสผ่าน</label>
																<div class="col-md-3">
																	<!-- type ควรจะเป็น password -->
                                <input  name="password" type="password"  value="<?php echo "$password"; ?>" class="form-control"></div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="money">อีเมล</label>
                                <div class="col-md-3">
                                <input  name="email" type="text" value="<?php echo "$email"; ?>" class="form-control"></div>
                                </div>

																<div class="form-group">
            											<label class="col-lg-3 control-label" for="select">สถานะ</label>
            												<div class="col-lg-3">
              												<select class="form-control" name="status" id="select">
                												<option value="<?=$status?>" ><?php
                  												if ($status == 500) {
                    												echo "ผู้ดูแลระบบ";
                  												}else if ($status == 100) {
                    												echo "ผู้บริหาร";
                  												}else if ($status == 0) {
                    												echo "สมาชิก";
                  												}
                												?></option>
                												<option value="0" >สมาชิก</option>
                												<option value="100" >ผู้บริหาร</option>
                												<option value="500" >ผู้ดูแลระบบ</option>
              												</select>
            												</div>
          												</div>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">


                                      <button name="btnEdit" type="submit" value="แก้ไขข้อมูลผู้ดูแลระบบ" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

        <!--main content ends-->
    </section>
    <!-- content -->
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
<!-- begining of page level js -->
<script src="asset/vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- end of page level js -->
</body>
</html>
