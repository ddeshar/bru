<?php
$page = 'Admin';
$title = 'Hello Admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>


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
						//แยกระหว่างชื่อกับนามสกุล
						$temp = explode(".", $_FILES["pro_Document"]["name"]);
						//ให้เปลี่ยนชื่อตามเวลาโดยใช้ฟังก์ชั่น
						$newfilename = round(microtime(true)) . '.' . end($temp);
						// หลังจากที่เปลี่ยนชื่อแล้ว จะไปอัพโหลดที่ โฟเดอร์ asset/uploads
						move_uploaded_file($_FILES["pro_Document"]["tmp_name"], "asset/uploads/" . $newfilename);

						$sql = "INSERT INTO promise (pro_id,mem_id,mem_name,mem_idcard,sub_id,app_pice,sub_date,pro_date,pro_number,sub_moneyloan,
										sub_idcardBM1,sub_idcardBM2,name1,name2,pro_redate,pro_Document,id_commit)
										VALUES('$pro_id','$mem_id','$mem_name','$mem_idcard','$sub_id','$app_pice','$sub_date','$pro_date','$pro_number','$sub_moneyloan',
													 '$sub_idcardBM1','$sub_idcardBM2','$name1','$name2','$pro_redate','$newfilename','$id_commit')";

						$result = mysqli_query($link, $sql);
						if ($result) {
							echo "<script type='text/javascript'>";
							echo "alert('เพิมเสร็จแล้ว');";
							echo "window.location='promise.php';";
							echo "</script>";
						}else{
							die("Query Failed" . mysqli_error($link));
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
	                                    <input id="pro_id" name="pro_id" type="text" placeholder="ID" class="form-control" readonly></div>
	                                </div>

	                                <div class="form-group">
	                                    <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
	                                    <div class="col-md-3">
	                                    <input id="mem_id" name="mem_id" type="text" placeholder="MEM-ID" class="form-control"></div>
	                                </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="name">ชื่อ-สกุลสมาชิก</label>
	                                    <div class="col-md-3">
	                                    <input id="mem_name" name="mem_name" type="text" placeholder="MEM-NAME" class="form-control"></div>
	                                </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="idcard">เลขที่บัตรประชาชนสมาชิก</label>
	                                    <div class="col-md-3">
	                                    <input id="mem_idcard" name="mem_idcard" type="text" placeholder="MEM-ID" class="form-control"></div>
	                                </div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="id">รหัสการอนุมัติ</label>
																			<div class="col-md-3">
																			<input id="app_id" name="sub_id" type="text" placeholder="SUB-ID" class="form-control"></div>
																	</div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="money">จำนวนเงินที่ขอกู้</label>
	                                    <div class="col-md-3">
	                                    <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control"></div>
	                                </div>

																	<div class="form-group">
																	<label class="col-md-3 control-label" for="date">วันที่อนุมัติ</label>
																	<div class="col-md-3">
																	<input type="date" id="datepicker" name="sub_date" class="form-control round-form"  placeholder="DATE"></div>
																	</div>

																	<div class="form-group">
																	<label class="col-md-3 control-label" for="date">วันที่ทำสัญญา</label>
																	<div class="col-md-3">
																	<input type="date" id="datepicker" name="pro_date" class="form-control round-form"  placeholder="DATE"></div>
																	</div>

																	<div class="form-group">
																			<label class="col-md-3 control-label" for="number">เลขที่สัญญา</label>
																			<div class="col-md-3">
																			<input id="pro_number" name="pro_number" type="text" placeholder="PRO-NUMBER" class="form-control"></div>
																	</div>
																	<div class="form-group">
																			<label class="col-md-3 control-label" for="money">จำนวนเงินที่อนุมัติ</label>
																			<div class="col-md-3">
																			<input id="app_pice" name="app_pice" type="text" placeholder="MONEY" class="form-control"></div>
																	</div>

	                                <div class="form-group">
	                                    <label class="col-md-3 control-label" for="idcard">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 1</label>
	                                    <div class="col-md-3">
	                                    <input id="sub_idcardBM1" name="sub_idcardBM1" type="text" placeholder="IDCARDBM1" class="form-control"></div>
	                                </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="name">ชื่อ-สกุลผู้ค้ำคนที่ 1</label>
	                                    <div class="col-md-3">
	                                    <input id="name1" name="name1" type="text" placeholder="NAMEBM1" class="form-control"></div>
	                                </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="idcard">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 2</label>
	                                    <div class="col-md-3">
	                                    <input id="sub_idcardBM2" name="sub_idcardBM2" type="text" placeholder="IDCARDBM2" class="form-control"></div>
	                                </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="name">ชื่อ-สกุลผู้ค้ำคนที่ 2</label>
	                                    <div class="col-md-3">
	                                    <input id="name2" name="name2" type="text" placeholder="NAMEBM2" class="form-control"></div>
	                                </div>

																	<div class="form-group">
																	<label class="col-md-3 control-label" for="date">วันครบกำหนดส่ง</label>
																	<div class="col-md-3">
																	<input type="date" id="datepicker" name="pro_redate" class="form-control round-form"  placeholder="DATE"></div>
																	</div>

																	<!--อัพโหลดไฟล์-->
																	<div class="form-group">
																			<label class="col-md-3 control-label" for="name">หลักฐานประกอบการกู้</label>
																			<div class="col-md-4">
																					<!-- <div class="fileinput fileinput-new input-group" data-provides="fileinput">
																							<div class="form-control" data-trigger="fileinput" name="pro_Document" id="pro_Document">
																									<i class="glyphicon glyphicon-file fileinput-exists"></i>
																									<span class="fileinput-filename"></span>
																							</div>
																							<span class="input-group-addon btn btn-default btn-file">
																									<span class="fileinput-new">เลือกไฟล์</span>
																									<span class="fileinput-exists">เปลี่ยน</span>
																									<input type="file" name="..."></span>
																							<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
																					</div> -->
																					<input type="file" name="pro_Document" value="">
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
<!-- end of page level js -->
</body>
</html>
