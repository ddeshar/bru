<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
if (isset($_POST["btnsubmit"])) {
		$user_id = $_POST["user_id"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$status = $_POST["status"];
		$sql = "INSERT INTO tbl_users (user_id,username,password,email,status)
		VALUES('$user_id','$username','$password','$email','$status')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='user.php';";
			echo "</script>";
			//header('location: admin_product.php');
		}else{
			die("Query Failed" . mysqli_error($conn));
			// echo "<font color='red'>SQL Error</font><hr>";
		}
	}
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            เพิ่มข้อมูลผู้เข้าใช้งาน
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
                เพิ่มข้อมูลผู้เข้าใช้งาน
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
											<h3 class="panel-title"> <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													เพิ่มผู้เข้าใช้งาน
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" method="post">
                            <fieldset>
                                <!-- Name input-->
																<!-- ไม่ต้องแสดงก็ได้ -->
                                <!-- <div class="form-group">
                                <label class="col-md-3 control-label" for="id">รหัส</label>
                                <div class="col-md-3">
                                <input id="user_id" name="user_id" type="text" placeholder="AUTO_ID" class="form-control" readonly></div>
                                </div> -->
                                <!-- Email input-->
                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ชื่อผู้ใช้</label>
                                <div class="col-md-3">
                                <input id="username" name="username" type="text" placeholder="USERNAME" class="form-control"></div>
                                </div>
                                <!-- Message body -->
																<div class="form-group">
                                <label class="col-md-3 control-label" for="user">รหัสผ่าน</label>
                                <div class="col-md-3">
																	<!-- ควรจะเป็น password -->
                                <input id="password" name="password" type="password" placeholder="PASSWORD" class="form-control"></div>
                                </div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="pass">อีเมล</label>
																<div class="col-md-3">
																<input id="email" name="email" type="email" placeholder="E-MAIL" class="form-control"></div>
																</div>

																<div class="form-group">
																            <label class="col-lg-3 control-label" for="select">สถานะ</label>
																            <div class="col-lg-3">
																              <select class="form-control" name="status" id="select">
																								 <option  >---เลือก---</option>
																								<option value="0" >สมาชิก</option>
																                <option value="100" >ผู้บริหาร</option>
																                <option value="500" >ผู้ดูแลระบบ</option>
																								<option value="999" >ไม่เป็นสมาชิก</option>
																              </select>
																            </div>
																          </div>

																                      <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">

                                         <button type="submit" name="btnsubmit" value="send" class="btn btn-primary">เพิ่ม</button>
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
