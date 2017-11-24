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

<div class="row">
	<aside class="right-side">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">

				<?php

					if (isset($_POST["btnsubmit"])) {
						$pro_id = $_POST["pro_id"];
						$mem_id = $_POST["mem_id"];
						$mem_name = $_POST["mem_name"];
						$mem_idcard = $_POST["mem_idcard"];
						$app_pice = $_POST["app_pice"];
						$sub_moneyloan = $_POST["sub_moneyloan"];
						$name1 = $_POST["name1"];
						$name2 = $_POST["name2"];
						$id_commit = $_POST["id_commit"];
						$pro_redate = $_POST["pro_redate"];
						$sanya = $_POST["sanya"];

							if (isset($_POST['pro_Document'])) {
								//แยกระหว่างชื่อกับนามสกุล
								$temp = explode(".", $_FILES["pro_Document"]["name"]);
								//ให้เปลี่ยนชื่อตามเวลาโดยใช้ฟังก์ชั่น
								$newfilename = round(microtime(true)) . '.' . end($temp);
								// หลังจากที่เปลี่ยนชื่อแล้ว จะไปอัพโหลดที่ โฟเดอร์ asset/uploads
								move_uploaded_file($_FILES["pro_Document"]["tmp_name"], "asset/uploads/" . $newfilename);
							}else {
								$newfilename = "";
							}

						$approvesql = "UPDATE `submitted` SET `sanya`= '3' WHERE sub_id = '$sanya'";
						$results=mysqli_query($link, $approvesql);

						$sql = "INSERT INTO promise (pro_id,mem_id,mem_name,mem_idcard,app_pice,sub_date,pro_date,sub_moneyloan,name1,name2,pro_redate,pro_Document,id_commit)VALUES('$pro_id','$mem_id','$mem_name','$mem_idcard','$app_pice',NOW(),NOW(),'$sub_moneyloan','$name1','$name2','$pro_redate','$newfilename','$id_commit')";
						$result = mysqli_query($link, $sql);

						if ($result) {
							echo "<script type='text/javascript'>";
							echo "alert('เพิมเสร็จแล้ว');";
							echo "window.location='promise.php';";
							echo "</script>";
						}else{
							die("Query Failed" . mysqli_error($link));
						}
					}else{

						if (isset($_GET["sub_id"])) {
							$sub_id = $_GET["sub_id"];
							$sqlproid = "SELECT * FROM submitted LEFT JOIN member ON submitted.mem_id = member.mem_id WHERE submitted.sub_id = '$sub_id'";
							$resultproid = mysqli_query($link, $sqlproid);

							if (mysqli_num_rows($resultproid) > 0) {
								$row = mysqli_fetch_array($resultproid);
								$mem_id = $row["mem_id"];
								$mem_name = $row["mem_name"];
								$sub_date = $row["sub_date"];
								$sub_moneyloan = $row["sub_moneyloan"];
								$mem_idcard = $row["mem_idcard"];
								$name1 = $row["name1"];
								$name2 = $row["name2"];
							}else{
								$mem_id = "";
								$mem_name = "";
								$sub_date = "";
								$sub_moneyloan = "";
								$mem_idcard = "";
								$name1 = "";
								$name2 = "";

							}


							$t2=date('Y-m-d', strtotime('+2 year', strtotime($sub_date)) );

						}
					}

				 ?>
	        <!--section starts-->
	        <h1>
	            เพิ่มข้อมูลการทำสัญญากู้ยืมเงิน
	        </h1>
	        <ol class="breadcrumb">
	            <li>
	                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
	                    Home
	                </a>
	            </li>
	            <li>
	                <a href="#">ข้อมูลการทำสัญญากู้ยืมเงิน</a>
	            </li>
	            <li class="active">
	                เพิ่มข้อมูลการทำสัญญา
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
														เพิ่มสัญญา
												</h3>
											</div>
	                    <div class="panel-body">
	                        <form class="form-horizontal" action="admin_promise_add.php" method="post" enctype="multipart/form-data">
	                            <fieldset>
	                                <!-- Name input-->
	                                <div class="form-group">
	                                    <label class="col-md-3 control-label" for="id">รหัสสัญญา</label>
	                                    <div class="col-md-3">
	                                    <input id="pro_id" name="pro_id" type="text" placeholder="AUTOID" class="form-control" readonly required></div>
	                                </div>

																		<div class="form-group">
																			<label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
																			<div class="col-md-3">
																				<input id="user_id_mem" value="<?=$mem_id?>" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly required></div>
																			</div>
									<!-- Email input-->
																		<div class="form-group">
																			<label class="col-md-3 control-label" for="name">ชื่อ</label>
																			<div class="col-md-3">
																				<input id="countryname_1" value="<?=$mem_name?>" name="mem_name" type="text" placeholder="NAME" class="form-control" required readonly></div>
																			</div>

																				<div class="form-group">
	                                    		<label class="col-md-3 control-label" for="idcard">เลขที่บัตรประชาชนสมาชิก</label>
	                                    		<div class="col-md-3">
	                                    		<input id="mem_idcard" value="<?=$mem_idcard?>" name="mem_idcard" type="text" placeholder="MEM-ID" class="form-control" required readonly></div>
	                                		</div>

																			<div class="form-group">
																				<label class="col-md-3 control-label" for="date">วันที่ยื่นกู้</label>
																				<div class="col-md-3">
																					<input type="date" value="<?=$sub_date?>" id="datepicker" name="sub_date" class="form-control round-form"  placeholder="DATE" readonly></div>
																				</div>

																				<div class="form-group">
																					<label class="col-md-3 control-label" for="date">วันครบกำหนดส่ง</label>
																					<div class="col-md-3">
																						<input type="date" value="<?=$t2?>" id="datepicker" name="pro_redate" class="form-control round-form"  placeholder="DATE" readonly></div>
																					</div>

																				<div class="form-group">
	                                    	<label class="col-md-3 control-label" for="name">ชื่อ-สกุลผู้ค้ำคนที่ 1</label>
	                                    	<div class="col-md-3">
																					<select class="form-control select2" name="name1" id="e1">
																						<option value="<?=$name1?>"><?=$name1?></option>
																						<?php
																						$membersql1 ="SELECT * FROM member";
																						$resultmem1 = mysqli_query($link, $membersql1);
																						while ($row=mysqli_fetch_array($resultmem1)){
																							?>
																							<option value="<?=$row['mem_id']?>"> <?=$row['mem_name']?></option>
																						<?php } ?>
																					</select>
																				</div>
	                                </div>

																		<div class="form-group">
	                                    	<label class="col-md-3 control-label" for="name">ชื่อ-สกุลผู้ค้ำคนที่ 2</label>
	                                    	<div class="col-md-3">
																					<select class="form-control select2" name="name2" id="e1">
																						<option value="<?=$name2?>"><?=$name2?></option>
																						<?php
																						$membersql1 ="SELECT * FROM member";
																						$resultmem1 = mysqli_query($link, $membersql1);
																						while ($row=mysqli_fetch_array($resultmem1)){
																							?>
																							<option value="<?=$row['mem_id']?>"> <?=$row['mem_name']?></option>
																						<?php } ?>
																					</select>
																				</div>
	                                </div>

																		<!--อัพโหลดไฟล์-->
																		<div class="form-group">
																			<label class="col-md-3 control-label" for="name">หลักฐานประกอบการกู้</label>
																			<div class="col-md-4">
																				<input type="file" name="pro_Document" class="form-control" >
																			</div>
																		</div>

																		<div class="form-group">
																			<label class="col-md-3 control-label" for="money">จำนวนเงินที่ขอกู้</label>
																			<div class="col-md-3">
																				<input id="sub_moneyloan" value="<?=$sub_moneyloan?>" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control"readonly></div>
																			</div>

																		<div class="form-group">
																			<label class="col-md-3 control-label" for="money">จำนวนเงินที่อนุมัติ</label>
																			<div class="col-md-4 input-group">
																				<input id="apppice" name="app_pice" type="text" placeholder="MONEY" class="form-control has-success" required >
																				<span id="result" class="input-group-addon"></span>
																			</div>
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
																		<input type="hidden" value="<?php echo $_GET["sub_id"]; ?>" name="sanya">
	                                    <div class="col-md-12 text-right">
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
</div>
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
<script type="text/javascript">

	$("#apppice").change(function(){
		if(parseInt(this.value) > 30000){
			$('input[name=app_pice]').parent().removeClass("has-success");
            $('input[name=app_pice]').parent().addClass("has-error");
			$('#result').html('<strong>ขออภัย</strong>คุณกรอกเกินจำนวนที่อนุมัติ');
		} else {
			$('input[name=app_pice]').parent().removeClass("has-error");
            $('input[name=app_pice]').parent().addClass("has-success");
			$('#result').html('<strong>ผ่าน</strong>');
		}
	});
</script>
