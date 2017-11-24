<?php
$page = 'Admin';
$title = 'Hello Admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<link href="asset/vendors/select2/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="asset/vendors/select2/select2-bootstrap.css" />
<!--end of page level css-->

EOT;
require_once('include/_header.php');
?>
<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/main.css" /> -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<?php
	if (isset($_POST["btnsubmit"])) {
			$pay_id = $_POST["pay_id"];
			$mem_id = $_POST["mem_id"];
			$mem_name = $_POST["mem_name"];
			$mem_idcard = $_POST["mem_idcard"];
			$pro_id = $_POST["pro_id"];
			//$pro_number = $_POST["pro_number"];
			$sub_moneyloan = $_POST["sub_moneyloan"];
			$pro_redate = $_POST["pro_redate"];
			// $pay_date = $_POST["pay_date"];
			$pay_pice = $_POST["pay_pice"];
			$id_commit = $_POST["id_commit"];

			$sanya = $_POST["sanya"];

			$approvesql = "UPDATE `submitted` SET `sanya`= '4' WHERE sub_id = '$sanya'";
			$results=mysqli_query($link, $approvesql);

			$sql = "INSERT INTO repayment (pay_id,mem_id,mem_name,mem_idcard,pro_id,sub_moneyloan,pro_redate,pay_date,pay_pice,id_commit)VALUES('$pay_id','$mem_id','$mem_name','$mem_idcard','$pro_id','$sub_moneyloan','$pro_redate',NOW(),'$pay_pice','$id_commit')";
			// echo $sql; exit;
			$result = mysqli_query($link, $sql);
			if ($result) {
				echo "<script type='text/javascript'>";
				echo "alert('เพิมเสร็จแล้ว');";
				echo "window.location='repayment.php';";
				echo "</script>";
			}else{
				die("Query Failed" . mysqli_error($link));
			}
		}else{

				if (isset($_GET["pro_id"])) {
					$pro_id = $_GET["pro_id"];
					$sqlproid = "SELECT * FROM promise
												LEFT JOIN member ON promise.mem_id = member.mem_id
												LEFT JOIN submitted ON promise.mem_id = submitted.mem_id
												WHERE promise.pro_id = '$pro_id'";
					$resultproid = mysqli_query($link, $sqlproid);

					if (mysqli_num_rows($resultproid) > 0) {
						$row = mysqli_fetch_array($resultproid);
						$mem_id = $row["mem_id"];
						$mem_name = $row["mem_name"];
						$sub_date = $row["sub_date"];
						$sub_moneyloan = $row["sub_moneyloan"];
						$mem_idcards = $row["mem_idcard"];
						$name1 = $row["name1"];
						$name2 = $row["name2"];
						$pro_id = $row["pro_id"];
						$pro_redate = $row["pro_redate"];
						$app_pice = $row["app_pice"];
						$sub_id = $row["sub_id"];
					}else{
						$mem_id = "";
						$mem_name = "";
						$sub_date = "";
						$sub_moneyloan = "";
						$mem_idcards = "";
						$name1 = "";
						$name2 = "";
						$pro_id = "";
						$pro_redate = "";
						$app_pice = "";
						$sub_id = "";
					}
					$t2=date('Y-m-d', strtotime('+2 year', strtotime($sub_date)) );
				}
			}

		 ?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            เพิ่มข้อมูลการจ่ายเงินกู้ให้ผู้กู้
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการจ่ายเงินกู้ให้ผู้กู้</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลการจ่ายเงินกู้ให้ผู้กู้
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
                <div class="panel panel-success" id="hidepanel1">
									<div class="panel-heading">
											<h3 class="panel-title"> <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													เพิ่มการจ่ายเงินกู้ให้ผู้กู้
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="admin_repayment_add.php" method="post">
                            <fieldset>

																<div class="form-group">
																	<label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
																	<div class="col-md-3">
																		<input id="user_id_mem" value="<?=$mem_id?>" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly></div>
																	</div>
																<!-- Email input-->
																<div class="form-group">
																	<label class="col-md-3 control-label" for="name">ชื่อ</label>
																	<div class="col-md-3">
																		<input id="countryname_1" value="<?=$mem_name?>" name="mem_name" type="text" placeholder="NAME" class="form-control" readonly></div>
																</div>

																<div class="form-group">
                                    <label class="col-md-3 control-label" for="mem_idcard">เลขที่บัตรประชาชนสมาชิก</label>
                                    <div class="col-md-3">
                                    <input id="user_idcard_mem" value="<?=$mem_idcards?>" name="mem_idcard" type="text" placeholder="MEM-IDCARD" class="form-control" readonly></div>
                                </div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="id">รหัสการทำสัญญา</label>
																		<div class="col-md-3">
																			<input id="pro_id" value="<?=$pro_id?>" name="pro_id" type="text" placeholder="PRO-ID" class="form-control" readonly></div>
																		</div>

																<div class="form-group">
                                    <label class="col-md-3 control-label" for="number">จำนวนที่อนุมัติ</label>
                                    <div class="col-md-3">
                                    <input id="sub_moneyloan" value="<?=$app_pice?>" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control" readonly></div>
                                </div>

																	<div class="form-group">
																		<label class="col-md-3 control-label" for="date">วันที่ครบกำหนดส่ง</label>
																		<div class="col-md-3">
																			<input type="date" id="pro_redate" value="<?=$pro_redate?>" name="pro_redate" class="form-control round-form"  placeholder="DATE" readonly></div>
																		</div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="money">จำนวนเงินที่จ่าย</label>
																		<div class="col-md-3">
																		<input id="pay_pice" name="pay_pice" type="text" placeholder="MONEY" class="form-control"></div>
																</div>

																<div class="form-group">
																	<label class="col-md-3 control-label" for="name">ชื่อกรรมการ</label>
																	<div class="col-md-3">
																<select class="form-control" name="id_commit" id="id_commit">
																				<option>--เลือก--</option>
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
                                    <div class="col-md-12 text-right">
																			<input type="hidden" value="<?=$sub_id?>" name="sanya">
                                         <button type="submit" name="btnsubmit" value="send" class="btn btn-success">เพิ่ม</button>
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
<script src="asset/vendors/select2/select2.js" type="text/javascript"></script>
<script src="asset/js/pages/formelements.js" type="text/javascript"></script>
<!-- end of page level js -->
</body>
</html>
