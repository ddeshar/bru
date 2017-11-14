<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการอนุมัติเงินกู้</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php

if (isset($_GET["sub_id"])) {
		$sub_id = $_GET["sub_id"];
		$sql = "SELECT * FROM submitted
						LEFT JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp
						LEFT JOIN commits ON submitted.id_commit = commits.id_commit
						WHERE sub_id='$sub_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$sub_id = $row["sub_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$sub_objective = $row["sub_objective"];
			$sub_date = $row["sub_date"];
			$sub_idcardBM1 = $row["sub_idcardBM1"];
			$name1 = $row["name1"];
			$sub_idcardBM2 = $row["sub_idcardBM2"];
			$name2 = $row["name2"];
			$id_commit = $row["name_commit"];
			$id_sapp = $row["status_app"];
		}else{
			$sub_id = "";
			$mem_id = "";
			$mem_name = "";
			$sub_moneyloan = "";
			$sub_objective = "";
			$sub_date = "";
			$sub_idcardBM1 = "";
			$name1 = "";
			$sub_idcardBM2 = "";
			$name2 = "";
			$id_commit = "";
			$id_sapp = "";
		}
	}
?>

						<div class="container">
						<h2><?=$mem_name?></h2>
						</div>
						<label for="id"><b>รหัสกการยื่นกู้</b> : <?=$sub_id?></label><br>
						<label for="id"><b>รหัสสมาชิก</b> : <?=$mem_id?></label><br>
						<label for="id"><b>ชื่อ-สกุลสมาชิก</b> : <?=$mem_name?></label><br>
						<label for="id"><b>จำนวนเงินที่ขอกู้</b> : <?php echo number_format($sub_moneyloan);?> บาท</label><br>
						<label for="id"><b>วัตถุประสงค์ในการขอกู้</b> : <?=$sub_objective?></label><br>
						<label for="id"><b>วันที่ยื่นกู้</b> : <?=$sub_date?></label><br>
						<label for="id"><b>เลขที่บัตรผู้ค้ำประกันคนที่ 1</b> : <?=$sub_idcardBM1?></label><br>
						<label for="id"><b>ชื่อผู้ค้ำประกันคนที่ 1</b> : <?=$name1?></label><br>
						<label for="id"><b>เลขที่บัตรผู้ค้ำประกันคนที่ 2้</b> : <?=$sub_idcardBM2?></label><br>
						<label for="id"><b>ชื่อผู้ค้ำประกันคนที่ 2</b> : <?=$name2?></label><br>
						<label for="id"><b>ชื่อกรรมการ</b> : <?=$id_commit?></label><br>
						<label for="id"><b>สถานะการกู้เงิน</b> : <?=$id_sapp?></label><br>


    </tbody>
</table>
