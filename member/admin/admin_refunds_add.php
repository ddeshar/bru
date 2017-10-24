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
// var_dump($_POST); exit();
		// $ref_id = $_POST["ref_id"];
		$mem_id = $_POST["mem_id"];
		$mem_name = $_POST["mem_name"];
		$sub_moneyloan = $_POST["sub_moneyloan"];
		// $ref_date = $_POST["ref_date"];
		$ref_moneytree = $_POST["ref_moneytree"];
		$ref_rate = $_POST["ref_rate"];
		$ref_picetotal = $_POST["ref_picetotal"];
		$pay = $_POST["pay"];
		$owe = $_POST["owe"];
		$ref_income = $_POST["ref_income"];
		$ref_out = $_POST["ref_out"];
		$id_commit = $_POST["id_commit"];
		$sql = "INSERT INTO refund (mem_id,mem_name,sub_moneyloan,ref_date,ref_moneytree,ref_rate,pay,owe,ref_picetotal,ref_income,ref_out,id_commit)
		VALUES('$mem_id','$mem_name','$sub_moneyloan',NOW(),'$ref_moneytree','$ref_rate','$pay','$owe','$ref_picetotal','$ref_income','$ref_out','$id_commit')";
		// echo $sql; exit;
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='admin_refunds_add.php';";
			echo "</script>";
			//header('location: admin_product.php');
		}else{
			die("Query Failed" . mysqli_error($link));
			// echo "<font color='red'>SQL Error</font><hr>";
		}
	}

?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            เพิ่มข้อมูลการชำระเงินกู้และดอกเบี้ย
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการชำระเงินกู้และดอกเบี้ย</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลการชำระเงินกู้และดอกเบี้ย
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
													เพิ่มการชำระเงินกู้และดอกเบี้ย
											</h3>
										</div>
                    <div class="panel-body">

											<form class="form-horizontal" action="admin_refunds_add.php" method="post" name="fak" id="fak" >
											    <fieldset>
											        <!-- Name input-->

											        <!-- <div class="form-group">
											        <label class="col-md-3 control-label" for="birth">วันที่ชำระ</label>
											        <div class="col-md-3">
											        <input type="date" id="datepicker" name="ref_date" class="form-control round-form"  placeholder="DATE"></div>
											        </div> -->

											        <div class="form-group">
											        <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
											        <div class="col-md-3">
											        <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly></div>
											        </div>
											        <!-- Email input-->
											        <div class="form-group">
											        <label class="col-md-3 control-label" for="name">ชื่อสมาชิก</label>
											        <div class="col-md-3">
											        <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" class="form-control"></div>
											        </div>
											        <!-- Message body -->
															<div class="form-group">
                                <label class="col-md-3 control-label" for="id">จำนวนเงินกู้</label>
                                <div class="col-md-3">
                                <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="PRICE" class="form-control" readonly></div>
                                </div>

																<div class="form-group">
                                <label class="col-md-3 control-label" for="id">อัตราดอกเบี้ย</label>
                                <div class="col-md-1">
                                <input id="percentage" name="rate" type="text" placeholder="RATE" class="form-control" value="6" readonly> </div>
																<label class=" control-label" for="id">% ต่อปี</label>
                                </div>



                                <div class="form-group">
                                <label class="col-md-3 control-label" for="id">เงินต้น</label>
                                <div class="col-md-3">
                                <input id="num1" name="ref_moneytree" type="text" placeholder="REF-MONEY" class="form-control"></div>
																	<label class=" control-label" for="id">บาท</label>
																</div>


                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ดอกเบี้ยที่ชำระ</label>
                                <div class="col-md-3">
                                <input id="num2" name="ref_rate" type="text" placeholder="REF-RATE" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาท</label>
																</div>


																<div class="form-group">
																<label class="col-md-3 control-label" for="name">รวมเงินต้นและดอกเบี้ยที่ชำระ</label>
																<div class="col-md-3">
																<input id="sum" name="ref_picetotal" type="text" placeholder="PRICE-TOTAL" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">จำนวนเงินที่ต้องชำระต่องวด</label>
																<div class="col-md-3">
																<input id="pay" name="pay" type="text" placeholder="PAY" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาทต่องวด</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">จำนวนเงินที่รับมา</label>
																<div class="col-md-3">
																<input id="num3" name="ref_income" type="text" placeholder="INCOME" class="form-control"></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">เงินทอน</label>
																<div class="col-md-3">
																<input id="sum_out" name="ref_out" type="text" placeholder="REF-OUT" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">ค้างชำระคงเหลือ</label>
																<div class="col-md-3">
																<input id="owe" name="owe" type="text" placeholder="OWE" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

                                <!-- Message body -->
																<div class="form-group">
																<label class="col-md-3 control-label" for="detail">ผู้รับชำระ</label>
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

<?php
require_once('refund.php');
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
				url : 'ajax.php',
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
		$('#sub_moneyloan').val(names[2]);
	}
	});

</script>

<script type="text/javascript">
 $(function() { //เงินต้น + ดอกเบี้ย / 24
 	$("#num1").on("keyup", function(){
		$("#num2").val(parseFloat($('#num1').val())*2*6/100);
 		$("#sum").val(parseFloat($('#num1').val())+parseFloat($('#num2').val()));
 		// Decimal
 		$("#pay").val(parseFloat(Math.round($('#sum').val()) / 24).toFixed(0));
 	});

 	$("#num3").on("keyup", function(){
 		$("#sum_out").val(parseFloat(Math.round($(this).val())-parseFloat($('#pay').val())).toFixed(0));
 		$("#owe").val(parseFloat($('#sum').val())-parseFloat($('#pay').val()));
	});
 });
 </script>
