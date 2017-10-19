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
			$pay_date = $_POST["pay_date"];
			$pay_pice = $_POST["pay_pice"];
			$id_commit = $_POST["id_commit"];


			$sql = "INSERT INTO repayment (pay_id,mem_id,mem_name,mem_idcard,pro_id,sub_moneyloan,pro_redate,pay_date,pay_pice,id_commit)
							VALUES('$pay_id','$mem_id','$mem_name','$mem_idcard','$pro_id','$sub_moneyloan','$pro_redate','$pay_date','$pay_pice','$id_commit')";
			$result = mysqli_query($link, $sql);
			if ($result) {
				echo "<script type='text/javascript'>";
				echo "alert('เพิมเสร็จแล้ว');";
				echo "window.location='repayment.php';";
				echo "</script>";
			}else{
				die("Query Failed" . mysqli_error($link));
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
                                <!-- Name input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="id">รหัสการจ่ายเงินกู้</label>
                                    <div class="col-md-3">
                                    <input id="pay_id" name="pay_id" type="text" placeholder="ID" class="form-control" readonly></div>
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
                                    <label class="col-md-3 control-label" for="mem_idcard">เลขที่บัตรประชาชนสมาชิก</label>
                                    <div class="col-md-3">
                                    <input id="user_idcard_mem" name="mem_idcard" type="text" placeholder="MEM-IDCARD" class="form-control" readonly></div>
                                </div>

																<div class="form-group">
																		<label class="col-md-3 control-label" for="id">รหัสการทำสัญญา</label>
																		<div class="col-md-3">
																		<input id="pro_id" name="pro_id" type="text" placeholder="PRO-ID" class="form-control"></div>
																</div>

																<!-- <div class="form-group">
                                    <label class="col-md-3 control-label" for="number">เลขที่สัญญา</label>
                                    <div class="col-md-3">
                                    <input id="pro_number" name="pro_number" type="text" placeholder="PRO-NUMBER" class="form-control"></div>
                                </div> -->

																<div class="form-group">
                                    <label class="col-md-3 control-label" for="number">จำนวนเงินกู้</label>
                                    <div class="col-md-3">
                                    <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control"></div>
                                </div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="date">วันที่ครบกำหนดส่ง</label>
																<div class="col-md-3">
																<input type="date" id="pro_redate" name="pro_redate" class="form-control round-form"  placeholder="DATE"></div>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="date">วันที่จ่ายเงินกู้</label>
																<div class="col-md-3">
																<input type="date" id="pay_date" name="pay_date" class="form-control round-form"  placeholder="DATE"></div>
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
<!-- end of page level js -->
</body>
</html>


<script type="text/javascript">
	$('#countryname_1').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax_repayment_add.php',
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
		$('#user_idcard_mem').val(names[2]);
		$('#pro_id').val(names[3]);
		$('#sub_moneyloan').val(names[4]);
		$('#pay_date').val(names[5]);
		$('#pro_redate').val(names[6]);
	}
	});

</script>
