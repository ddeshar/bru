<?php
$page = 'Admin';
$title = 'Hello Admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />

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
						$sub_idcardBM1 = $_POST["sub_idcardBM1"];
						$sub_idcardBM2 = $_POST["sub_idcardBM2"];
						$name1 = $_POST["name1"];
						$name2 = $_POST["name2"];
						$id_commit = $_POST["id_commit"];

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

						$sql = "INSERT INTO promise (pro_id,mem_id,mem_name,mem_idcard,app_pice,sub_date,pro_date,sub_moneyloan,sub_idcardBM1,sub_idcardBM2,name1,name2,pro_redate,pro_Document,id_commit)VALUES('$pro_id','$mem_id','$mem_name','$mem_idcard','$app_pice',NOW(),NOW(),'$sub_moneyloan', '$sub_idcardBM1','$sub_idcardBM2','$name1','$name2',NOW()+INTERVAL 24 MONTH,'$newfilename','$id_commit')";
// echo $sql; exit;
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
													        <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly></div>
													        </div>
													        <!-- Email input-->
													        <div class="form-group">
													        <label class="col-md-3 control-label" for="name">ชื่อ</label>
													        <div class="col-md-3">
													        <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" class="form-control"></div>
													        </div>

																	<div class="form-group">
	                                    <label class="col-md-3 control-label" for="idcard">เลขที่บัตรประชาชนสมาชิก</label>
	                                    <div class="col-md-3">
	                                    <input id="mem_idcard" name="mem_idcard" type="text" placeholder="MEM-ID" class="form-control"></div>
	                                </div>

																	<!-- <div class="form-group">
																			<label class="col-md-3 control-label" for="id">รหัสการอนุมัติ</label>
																			<div class="col-md-3">
																			<input id="app_id" name="sub_id" type="text" placeholder="SUB-ID" class="form-control"></div>
																	</div> -->

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

																	<!-- <div class="form-group">
																			<label class="col-md-3 control-label" for="number">เลขที่สัญญา</label>
																			<div class="col-md-3">
																			<input id="pro_number" name="pro_number" type="text" placeholder="PRO-NUMBER" class="form-control" readonly></div>
																	</div> -->
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
<script type="text/javascript">
	$('#countryname_1').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax_promise_add.php',
				dataType: "json",
				method: 'post',
			data: {
				 name_startsWith: request.term,
				 type: 'country_table',
				 row_num : 1
			},
			success: function( data ) {
				response( $.map( data, function( item ) {
					var code = item.split("|");
						return {
							label: code[0],
							value: code[0],
							data : item
						}
				}));
			}
			});
		},
		autoFocus: true,
		minLength: 0,
		select: function( event, ui ) {
		var names = ui.item.data.split("|");
		$('#user_id_mem').val(names[1]);
		$('#mem_idcard').val(names[2]);
		$('#sub_moneyloan').val(names[3]);
		$('#sub_idcardBM1').val(names[4]);
		$('#name1').val(names[5]);
		$('#sub_idcardBM2').val(names[6]);
		$('#name2').val(names[7]);
	}
	});

</script>
