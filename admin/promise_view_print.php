<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการทำสัญญาเงินกู้</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php

if (isset($_GET["pro_id"])) {
		$pro_id = $_GET["pro_id"];
		$sql = "SELECT * FROM promise
						LEFT JOIN member ON promise.mem_id = member.mem_id
						LEFT JOIN statusb_app ON promise.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON promise.id_commit = commits.id_commit
						WHERE pro_id='$pro_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pro_id = $row["pro_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
      $mem_idcard = $row["mem_idcard"];
			$app_pice = $row["app_pice"];
			$sub_date = $row["sub_date"];
			$pro_date = $row["pro_date"];
			//$pro_number = $row["pro_number"];
			$sub_moneyloan = $row["sub_moneyloan"];

			$name1 = $row["name1"];
			$name2 = $row["name2"];
			$pro_redate = $row["pro_redate"];
			$id_commit = $row["name_commit"];
			$id_sapp = $row["id_sapp"];
		}else{
			$pro_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			//$sub_id = "";
			$app_pice = "";
			$sub_date = "";
			$pro_date = "";
			//$pro_number = "";
			$sub_moneyloan = "";

			$name1 = "";
			$name2 = "";
			$pro_redate = "";
			$id_commit = "";
			$id_sapp = "";
		}
	}
?>

						<div class="container">
						<h2><?=$mem_name?><p></h2>
						</div>
						<label for="id"><b>รหัสการทำสัญญา</b> : <?=$pro_id?></label><br>
						<label for="id"><b>รหัสสมาชิก</b> : <?=$mem_id?></label><br>
						<label for="id"><b>ชื่อ-สกุลสมาชิก</b> : <?=$mem_name?></label><br>
						<label for="id"><b>เลขที่บัตรประจำตัวประชาชาชน</b> : <?=$mem_idcard?></label><br>
													<!-- <label class="col-md-5 control-label" for="id">รหัสการอนุมัติ</label><p><?//=$sub_id?></p> -->
						<label for="id"><b>จำนวนเงินที่อนุมัติ</b> : <?php echo number_format($app_pice);?> บาท</label><br>
						<label for="id"><b>วันที่อนุมัติ</b> : <?=$sub_date?></label><br>
						<label for="id"><b>วันที่ทำสัญญา</b> : <?=$pro_date?></label><br>
													<!-- <label class="col-md-5 control-label" for="id">เลขทีสัญญา</label><p><?//=$pro_number?></p> -->
						<label for="id"><b>จำนวนเงินกู้</b> : <?php echo number_format($sub_moneyloan);?> บาท</label><br>

						<label for="id"><b>ชื่อ-สกุลผู้ค้ำคนที่ 1</b> : <?=$name1?></label><br>

						<label for="id"><b>ชื่อ-สกุลผู้ค้ำคนที่ 2</b> : <?=$name2?></label><br>
						<label for="id"><b>วันครบกำหนดส่ง</b> : <?=$pro_redate?></label><br>
						<label for="id"><b>ชื่อกรรมการ</b> : <?=$id_commit?></label><br>


    </tbody>
</table>
