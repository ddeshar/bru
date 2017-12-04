<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT

<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />

<!--end of page level css--><!--end of page level css-->
EOT;
require_once('include/_header.php');
?>
<link rel="stylesheet" type="text/css" href="asset/css/jquery-ui.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="asset/js/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<?php
if (isset($_POST["btnsubmit"])) {

		$mem_id = $_POST["mem_id"];
		$mem_name = $_POST["mem_name"];
		$id_commit = $_POST["id_commit"];
		$fak_total = $_POST["fak_total"];
		$status = $_POST["status"];

		$updatestatus = "UPDATE `tbl_users` SET `status` = '$status' WHERE `tbl_users`.`mem_id` = '$mem_id'";
		$results=mysqli_query($link, $updatestatus);

		$sql = "INSERT INTO stop_member (stop_date,mem_id,mem_name,id_commit,fak_total,status)
		VALUES(NOW(),'$mem_id','$mem_name','$id_commit','$fak_total','$status')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='admin_stopmember_add.php';";
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
            เพิ่มข้อมูลการยกเลิกบัญชี
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการยกเลิกบัญชี</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลการยกเลิกบัญชี
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
													เพิ่มการยกเลิกบัญชี
											</h3>
										</div>
                    <div class="panel-body">

											<form class="form-horizontal" action="admin_stopmember_add.php" method="post" name="fak" id="fak" >
											    <fieldset>
											        <!-- Name input-->
											        <div class="form-group">
											        <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
											        <div class="col-md-3">
											        <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly></div>
											        </div>
											        <!-- Email input-->
											        <div class="form-group">
											        <label class="col-md-3 control-label" for="name">ชื่อสมาชิก</label>
											        <div class="col-md-3">
											        <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" class="form-control" required></div>
											        </div>
											        <!-- Message body -->


											        <div class="form-group">
											        <label class="col-md-3 control-label" for="pass">เงินฝากคงเหลือ</label>
											        <div class="col-md-3">
											        <input id="num1" name="fak_total" type="text" placeholder="MONEY" class="form-control" readonly value=""></div>
											        </div>

															<div class="form-group">
																<label class="col-lg-3 control-label" for="select">สถานะ</label>
																<div class="col-lg-3">
																	<select class="form-control" name="status" id="select">
																		<option value="999" >ยกเลิกการเป็นสมาชิก</option>
																	</select>
																</div>
															</div>

															<div class="form-group">
															<label class="col-md-3 control-label" for="detail">ชื่อกรรมการ</label>
															<div class="col-md-3">
															<select class="form-control" name="id_commit" id="id_commit">
																			<option>--เลือก--</option>
																			<?php
																				$sql="SELECT * FROM commits";
																				$result = mysqli_query($link, $sql);
																				while ($row=mysqli_fetch_array($result)){
																			?>
																			<option value="<?=$row['id_commit']?>"> <?=$row['name_commit']?></option>
																			<?php } ?>
																			</select>

																		</div>
																	</div>

																	<div class="form-group">
																		<label class="col-md-3 control-label" id="result"></label>
																	<div class="col-md-3">
																	<input id="num2" name="fak_test" type="hidden" value="">
																</div>
																</div>

											                              <!-- Form actions -->
											        <div class="form-group">
											            <div class="col-md-12 text-right">

											                 <button type="submit" name="btnsubmit" value="send" class="btn btn-primary">บันทึก</button>
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
<script type="text/javascript">
	$('#countryname_1').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax_stopmem.php',
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
		$('#num1').val(names[2]);
		$('#num2').val(names[3]);
		// var newa = parseInt($('#num').val(names[3]));
		var newa = $('#num2').val();

		if (newa == 1) {
			$('#result').html('<strong>ขออภัย</strong>คุณไม่สามารถยกเลิกบัญชีได้ เนื่องจากคุณค้างชำระเงินกู้อยู่!!');
		}else{
			$('#result').html('<strong>ขอบคุณ</strong></strong>ที่ใช้บริการคะ');
		}

		// alert(msg);

	}
	});

</script>

<?php
 require_once('stopmember.php');
?>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
<!-- begining of page level js -->
<script src="asset/vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- end of page level js -->
</body>
</html>
