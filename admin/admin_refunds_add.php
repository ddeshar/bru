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
		$mem_id = $_POST["mem_id"];
		$mem_name = $_POST["mem_name"];
		$ref_moneytree = $_POST["ref_moneytree"];
		$ref_rate = $_POST["ref_rate"];
		$ref_picetotal = $_POST["ref_picetotal"];
		$ref_income = $_POST["ref_income"];
		$rate = $_POST["rate"];
		$id_commit = $_POST["id_commit"];
		$sql = "INSERT INTO refund (mem_id,mem_name,pay_pice,ref_date,rate,ref_rate,ref_picetotal,ref_income,id_commit) VALUES('$mem_id','$mem_name','$ref_moneytree',NOW(),'$rate','$ref_rate','$ref_picetotal','$ref_income','$id_commit')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='rate.php';";
			echo "</script>";
		}else{
			die("Query Failed" . mysqli_error($link));
		}
	}

	if (isset($_GET["pay_id"])) {
			$pay_id = $_GET["pay_id"];
			$sql = "SELECT * FROM `repayment` WHERE pay_id ='$pay_id'";
			$result = mysqli_query($link, $sql);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
					$pay_id = $row["pay_id"];
					$mem_id = $row["mem_id"];
					$mem_name = $row["mem_name"];
					$pay_pice = $row["pay_pice"];
			}else{
				$pay_id = "";
				$mem_id = "";
				$mem_name = "";
				$pay_pice = "";
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
											        <!-- Email input-->
											        <div class="form-group">
											        <label class="col-md-3 control-label" for="name">ชื่อสมาชิก</label>
											        <div class="col-md-3">
																<input value="<?=$mem_id?>" name="mem_id" type="text" hidden="">
											        <input id="countryname_1" value="<?=$mem_name?>" name="mem_name" type="text" placeholder="NAME" class="form-control" readonly ></div>
											        </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="id">เงินต้น</label>
                                <div class="col-md-3">
                                <input id="actual" value="<?=$pay_pice?>" name="ref_moneytree" type="text" placeholder="REF-MONEY" class="form-control" readonly></div>
																	<label class=" control-label" for="id">บาท</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="id">อัตราดอกเบี้ย</label>
																<div class="col-md-1">
																<input id="percentage" name="rate" type="text" placeholder="RATE" class="form-control" value="6" readonly> </div>
																<label class=" control-label" for="id">% ต่อปี (2 ปี)</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">ดอกเบี้ย</label>
																<div class="col-md-3">
<input id="permonth" value="" name="ref_picetotal" type="text" placeholder="PRICE-TOTAL" class="form-control" ></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">เงินต้นและดอกเบี้ยที่ต้องชำระ</label>
                                <div class="col-md-3">
<input id="percentagepermonth" value="" name="ref_rate" type="text" placeholder="REF-RATE" class="form-control" readonly></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

																<div class="form-group">
																<label class="col-md-3 control-label" for="name">จำนวนเงินที่รับมา</label>
																<div class="col-md-3">
		<input id="given" name="ref_income" type="text" placeholder="INCOME" class="form-control" required onchange="subtraction();"></div>
																<label class=" control-label" for="id">บาท</label>
																</div>

																<div id="input-Error" class="form-group ">
														      <label class="col-md-3 control-label">Input</label>
														      <div class="col-md-4">
														        <input type="text" value="" class="form-control" id="inputError" readonly>
														      </div>
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
	require_once('include/_footer.php');
?>
<script src="asset/vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- end of page level js -->
</body>
</html>

<script type="text/javascript">

var percentage = document.getElementById('percentage').value;  // อัตราดอกเบี้ย

// formula for percentagepermonth
	var subtotal = document.getElementById('actual').value;
	var year = parseFloat(parseFloat(parseFloat(subtotal) * parseFloat(percentage) * parseFloat(2)) / parseFloat(100));
	var total = parseFloat(parseFloat(subtotal) + parseFloat(year));

	document.getElementById("permonth").value = year;
	document.getElementById("percentagepermonth").value = total;


function subtraction(){
	var adding = document.getElementById('percentagepermonth').value;
	var getfromcustomer = document.getElementById('given').value;
	var totaladded = Math.abs(parseInt(getfromcustomer) - parseInt(adding));

	if (adding <= getfromcustomer) {
		document.getElementById('input-Error').className = 'form-group has-success';
		document.getElementById("inputError").value ="จำนวนเงินที่จะต้องทอนคือ"+ totaladded +" บาท";
	}else{
		document.getElementById('input-Error').className = 'form-group has-error';
		document.getElementById("inputError").value ="ยอดเงินของคุณไม่เพียงพอ กรุณาเพิ่มเงิน"+ totaladded +" บาท ";
	}

}

</script>
