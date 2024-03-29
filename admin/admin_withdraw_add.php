<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
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
		$id_commit = $_POST["id_commit"];
		$withdraw = $_POST["withdraw"];
		$fak_total = $_POST["fak_total"];


		$sql = "INSERT INTO deposit (fak_date,mem_id,id_commit,withdraw,fak_total)
		VALUES(NOW(),'$mem_id','$id_commit','$withdraw','$fak_total')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='admin_withdraw_add.php';";
			echo "</script>";
		}else{
			die("Query Failed" . mysqli_error($link));
		}
	}elseif (isset($_POST["sorry"])){
		echo "<script type='text/javascript'>";
		echo "alert('ไม่สามารถถอนเงินได้');";
		echo "</script>";
	}
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            เพิ่มข้อมูลการถอน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการถอน</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลการถอน
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
                <div class="panel panel-danger" id="hidepanel1">
									<div class="panel-heading">
											<h3 class="panel-title"> <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													เพิ่มการถอน
											</h3>
										</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" method="post">
                            <fieldset>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
                                <div class="col-md-3">
                                <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly ></div>
                                </div>
                                <!-- Email input-->
                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ชื่อผู้ถอน</label>
                                <div class="col-md-3">
                                <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" class="form-control"  required></div>
                                </div>
                                <!-- Message body -->
																<div class="form-group">
																<label class="col-md-3 control-label" for="detail">ชื่อผู้รับถอน</label>
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
																<label class="col-md-3 control-label" for="pass">จำนวนเงินที่ต้องการถอน</label>
																<div class="col-md-3">
																<input id="num1" name="withdraw" type="text" placeholder="RECIVER" class="form-control"  required></div>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="pass">ยอดยกมา</label>
																<div class="col-md-3">
																<input id="num2" name="fak_total" type="text" placeholder="MONEY" class="form-control" readonly></div>
																</div>
																<div class="form-group">
																	<label class="col-md-3 control-label" for="pass">ยอดคงเหลือ</label>
																	<div class="col-md-3">
																		<input id="sum" name="fak_total" type="text" placeholder="TOTAL" class="form-control" readonly></div>
																		<p id="result"></p>
																</div>
																                      <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">

                                         <button type="submit" id="subbutton" name="btnsubmit" value="send" class="btn btn-danger">ถอน</button>
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

<?php
require_once('withdraw.php');
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
<script type="text/javascript">
	$('#countryname_1').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax_deposit_add.php',
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
		$('#num2').val(names[2]);
	}
	});

	$(function() {
		$("#num1, #num2").on("keydown keyup", sum);

		function sum() {
			$("#sum").val(Number($("#num2").val()) - Number($("#num1").val()));

			var subtract = parseInt($("#sum").val());

			if (subtract < 0) {
				text = "ไม่สามารถถอนเงินได้";

				$("#subbutton").text("ไม่สามารถถอนเงินได้");
				$("#subbutton").prop("name", "sorry");
				$("#subbutton").prop('disabled', true);
			} else {
				text = "สามารถถอนเงินได้";
				$("#subbutton").text("ถอนเงินได้");
				$("#subbutton").prop("name", "btnsubmit");
				$("#subbutton").prop('disabled', false);
			}
			$("#result").html(text);

		}

	});
</script>
