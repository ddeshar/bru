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
		$pro_id = $_POST["pro_id"];
		$pro_number = $_POST["pro_number"];
		$pro_pice = $_POST["pro_pice"];
		$date_sent = $_POST["date_sent"];
		$pay_date = $_POST["pay_date"];
		$pay_pice = $_POST["pay_pice"];
		$id_commit = $_POST["id_commit"];

		$sql = "UPDATE repayment SET  mem_id='$mem_id',mem_name='$mem_name', mem_idcard='$mem_idcard',pro_id='$pro_id', pro_number='$pro_number',pro_pice='$pro_pice',date_sent='$date_sent', pay_date='$pay_date', pay_pice='$pay_pice',id_commit='$id_commit' WHERE pay_id='$id'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('แก้ไขข้อมูลสำเร็จ');";
			echo "window.location='repayment.php';";
			echo "</script>";
			//header('location: admin_product.php');
		}else{
			echo "<font color='red'>SQL Error</font><hr>";
		}
	}else{
		$id = $_GET["pay_id"];
		$sql = "SELECT * FROM repayment
						LEFT JOIN member ON repayment.mem_id = member.mem_id
						LEFT JOIN promise ON repayment.pro_id = promise.pro_id
						LEFT JOIN commits ON repayment.id_commit = commits.id_commit
						WHERE pay_id='$id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pay_id = $row["pay_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			$pro_id = $row["pro_id"];
			$pro_number = $row["pro_number"];
			$pro_pice = $row["pro_pice"];
			$date_sent = $row["date_sent"];
			$pay_date = $row["pay_date"];
			$pay_pice = $row["pay_pice"];
			$id_commit = $row["id_commit"];
		}else{
			$pay_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			$pro_id = "";
			$pro_number = "";
			$pro_pice = "";
			$date_sent = "";
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
          แก้ไขข้อมูลการจ่ายเงินให้ผู้กู้
				        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">แก้ไขข้อมูลการจ่ายเงินให้ผู้กูู้</a>
            </li>
            <li class="active">
                แก้ไขข้อมูลการจ่ายเงินให้ผู้กู้
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
													แก้ไขข้อมูลการจ่ายเงินให้ผู้กู้
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="admin_repayment_edit.php" method="post">
                            <fieldset>

															<div class="form-group">
																	<label class="col-md-3 control-label" for="id">รหัสการจ่ายเงินกู้</label>
																	<div class="col-md-3">
																	<input id="pay_id" name="pay_id" type="text" value="<?php echo "$pay_id"; ?>" class="form-control"></div>
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
																	<label class="col-md-3 control-label" for="id">รหัสการทำสัญญา</label>
																	<div class="col-md-3">
																	<input id="pro_id" name="pro_id" type="text" value="<?php echo "$pro_id"; ?>" class="form-control"></div>
															</div>

															<div class="form-group">
																	<label class="col-md-3 control-label" for="number">เลขที่สัญญา</label>
																	<div class="col-md-3">
																	<input id="pro_number" name="pro_number" type="text" value="<?php echo "$pro_number"; ?>" class="form-control"></div>
															</div>

															<div class="form-group">
																	<label class="col-md-3 control-label" for="number">จำนวนเงินกู้</label>
																	<div class="col-md-3">
																	<input id="pro_pice" name="pro_pice" type="text" value="<?php echo "$pro_pice"; ?>" class="form-control"></div>
															</div>

															<div class="form-group">
															<label class="col-md-3 control-label" for="date">วันที่ครบกำหนดส่ง</label>
															<div class="col-md-3">
															<input type="date" id="datepicker" name="date_sent" class="form-control "  value="<?php echo "$date_sent"; ?>"></div>
															</div>

															<div class="form-group">
															<label class="col-md-3 control-label" for="date">วันที่จ่ายเงินกู้</label>
															<div class="col-md-3">
															<input type="date" id="datepicker" name="pay_date" class="form-control "  value="<?php echo "$pay_date"; ?>"></div>
															</div>

															<div class="form-group">
																	<label class="col-md-3 control-label" for="money">จำนวนเงินที่จ่าย</label>
																	<div class="col-md-3">
																	<input id="pay_pice" name="pay_pice" type="text" value="<?php echo "$pay_pice"; ?>" class="form-control"></div>
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


                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">

																			<input type ="hidden" name="id" value="<?=$pay_id?>">
                                      <button name="btnEdit" type="submit" value="แก้ไขข้อมูลการจ่ายเงินให้ผู้กู้" class="btn btn-primary">บันทึก</button>
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
