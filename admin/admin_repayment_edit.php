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
		$id = $_POST["id"]; //เก็บค่า id เก่า เพื่ออัพเดตข้อมูล
		$mem_id = $_POST["mem_id"];
		$mem_name = $_POST["mem_name"];
		$mem_idcard = $_POST["mem_idcard"];
		$sub_id = $_POST["sub_id"];
		$app_pice = $_POST["app_pice"];
		$sub_date = $_POST["sub_date"];
		$pro_date = $_POST["pro_date"];
		$pro_number = $_POST["pro_number"];
		$sub_moneyloan = $_POST["sub_moneyloan"];
		$sub_idcardBM1 = $_POST["sub_idcardBM1"];
		$sub_idcardBM2 = $_POST["sub_idcardBM2"];
		$name1 = $_POST["name1"];
		$name2 = $_POST["name2"];
		$pro_redate = $_POST["pro_redate"];
		$id_commit = $_POST["id_commit"];
		$id_sapp = $_POST["id_sapp"];

		$sql = "UPDATE promise SET  mem_id='$mem_id',mem_name='$mem_name', mem_idcard='$mem_idcard',sub_id='$sub_id', app_pice='$app_pice',sub_date='$sub_date',pro_date='$pro_date', pro_date='$pro_date', pro_number='$pro_number',sub_moneyloan='$sub_moneyloan',sub_idcardBM1='$sub_idcardBM1',sub_idcardBM2='$sub_idcardBM2', name1='$name1',name2='$name2',pro_redate='$pro_redate', id_commit='$id_commit',id_sapp='$id_sapp' WHERE pro_id='$id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('แก้ไขข้อมูลสำเร็จ');";
			echo "window.location='promise.php';";
			echo "</script>";
			//header('location: admin_product.php');
		}else{
			echo "<font color='red'>SQL Error</font><hr>";
		}
	}else{
		$id = $_GET["pro_id"];
		$sql = "SELECT * FROM promise
						LEFT JOIN member ON promise.mem_id = member.mem_id
						LEFT JOIN statusb_app ON promise.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON promise.id_commit = commits.id_commit
						WHERE pro_id='$id'";
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
			$id_commit = $row["id_commit"];
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
          แก้ไขข้อมูลการอนุมัติเงินกูู้
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">แก้ไขข้อมูลการอนุมัติเงินกูู้้</a>
            </li>
            <li class="active">
                แก้ไขข้อมูลการอนุมัติเงินกู้
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
                <div class="panel panel-warning" id="hidepanel1">
									<div class="panel-heading">
											<h3 class="panel-title"> <i class="livicon" data-name="pencil" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													แก้ไขข้อมูลการอนุมัติเงินกู้
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="admin_promise_edit.php" method="post">
                            <fieldset>

                                <div class="form-group">
                                    <label for="id" class="col-md-3 control-label">รหัสการการอนุมัติ</label>
                                    <div class="col-md-3">
                                    <input  name="pro_id" type="text" type="text" value="<?php echo "$pro_id"; ?>" class="form-control"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
                                    <div class="col-md-3">
                                    <input  name="mem_id" type="text"  value="<?php echo "$mem_id"; ?>" class="form-control"></div>
                                </div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="name">ชื่อ-สกุลสมาชิก</label>
																		<div class="col-md-3">
																				<input  name="mem_name" type="text"  value="<?php echo "$mem_name"; ?>" class="form-control"></div>
																		</div>

																		<div class="form-group">
																				<label class="col-md-3 control-label" for="name">เลขที่บัตรประจำตัวประชาชน</label>
																				<div class="col-md-3">
																						<input  name="mem_idcard" type="text"  value="<?php echo "$mem_idcard"; ?>" class="form-control"></div>
																				</div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="money">รหัสการอนุมัติ</label>
																		<div class="col-md-3">
																				<input  name="sub_id" type="text" value="<?php echo "$sub_id"; ?>" class="form-control">
																			</div>
																</div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">จำนวนเงินที่ขอกู้</label>
                                    <div class="col-md-3">
                                        <input  name="sub_moneyloan" type="text" value="<?php echo "$sub_moneyloan"; ?>" class="form-control">
                                    </div>
                                </div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="birth">วันที่อนุมัติ</label>
																		<div class="col-md-3">
																				<input type="date" id="datepicker" name="sub_date" class="form-control round-form" value="<?php echo "$sub_date"; ?>" >
																			</div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="birth">วันทีทำสัญญา</label>
																			<div class="col-md-3">
																					<input type="date" id="datepicker" name="pro_date" class="form-control round-form" value="<?php echo "$pro_date"; ?>" >
																				</div>
																		</div>

																		<div class="form-group">
		                                    <label class="col-md-3 control-label" for="name">เลขที่สัญญา</label>
		                                    <div class="col-md-3">
		                                        <input  name="pro_number" type="text" value="<?php echo "$pro_number"; ?>" class="form-control">
		                                    </div>
		                                </div>

																		<div class="form-group">
		                                    <label class="col-md-3 control-label" for="name">จำนวนเงินที่อนุมัติ</label>
		                                    <div class="col-md-3">
		                                        <input  name="app_pice" type="text" value="<?php echo "$app_pice"; ?>" class="form-control">
		                                    </div>
		                                </div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="name">เลขที่บัตรผู้ค้ำประกันคนที่ 1</label>
																			<div class="col-md-3">
																					<input  name="sub_idcardBM1" type="text"  value="<?php echo "$sub_idcardBM1"; ?>" class="form-control">
																			</div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="name">ชื่อผู้ค้ำประกันคนที่ 1</label>
																			<div class="col-md-3">
																					<input  name="name1" type="text"  value="<?php echo "$name1"; ?>" class="form-control">
																			</div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="name">เลขที่บัตรผู้ค้ำประกันคนที่ 2</label>
																			<div class="col-md-3">
																					<input  name="sub_idcardBM2" type="text"  value="<?php echo "$sub_idcardBM2"; ?>" class="form-control">
																			</div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="name">ชื่อผู้ค้ำประกันคนที่ 2</label>
																			<div class="col-md-3">
																					<input  name="name2" type="text"  value="<?php echo "$name2"; ?>" class="form-control">
																			</div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="birth">วันทีครบกำหนดส่ง</label>
																			<div class="col-md-3">
																					<input type="date" id="datepicker" name="pro_redate" class="form-control round-form" value="<?php echo "$pro_date"; ?>" >
																				</div>
																		</div>

																		<div class="form-group">
																				<label class="col-md-3 control-label" for="name">หลักฐานประกอบการกู้</label>
																				<div class="col-md-4">
																						<input type="file" name="pro_Document" value="">
																				</div>
																		</div>

																	<div class="form-group">
																		<label class="col-md-3 control-label" for="commit">ชื่อกรรมการ</label>
																		<div class="col-md-3">
																	<select class="form-control" name="id_commit" id="id_commit">
																					<?php
																						$sql="SELECT * FROM commits";
																						$result = mysqli_query($link, $sql);
																						while ($row=mysqli_fetch_array($result)){
																					?>
																					<option value="<?=$row['id_commit']?>"> <?=$row['name_commit']?></option>
																					<?php
																						}
																					?>
																					</select>
																				</div>
																	</div>

																	<div class="form-group">
																		<label class="col-md-3 control-label" for="commit">สถานะการอนุมัติ</label>
																		<div class="col-md-3">
																	<select class="form-control" name="id_sapp" id="id_sapp">
																					<?php
																						$sql="SELECT * FROM statusb_app";
																						$result = mysqli_query($link, $sql);
																						while ($row=mysqli_fetch_array($result)){
																					?>
																					<option value="<?=$row['id_sapp']?>"> <?=$row['status_app']?></option>
																					<?php
																						}
																					?>
																					</select>
																				</div>
																	</div>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">

																			<input type ="hidden" name="id" value="<?=$pro_id?>">
                                      <button name="btnEdit" type="submit" value="แก้ไขข้อมูลการยื่นกู้" class="btn btn-primary">บันทึก</button>
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
