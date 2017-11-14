<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการจ่ายเงินให้ผู้กู้</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php
if (isset($_GET["pay_id"])) {
		$pay_id = $_GET["pay_id"];
		$sql = "SELECT * FROM repayment
						LEFT JOIN member ON repayment.mem_id = member.mem_id
						LEFT JOIN promise ON repayment.pro_id = promise.pro_id
						LEFT JOIN commits ON repayment.id_commit = commits.id_commit
						WHERE pay_id='$pay_id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$pay_id = $row["pay_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$mem_idcard = $row["mem_idcard"];
			$pro_id = $row["pro_id"];
			$pro_number = $row["pro_number"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$pro_redate = $row["pro_redate"];
			$pay_date = $row["pay_date"];
			$pay_pice = $row["pay_pice"];
			$id_commit = $row["name_commit"];
		}else{
			$pay_id = "";
			$mem_id = "";
			$mem_name = "";
			$mem_idcard = "";
			$pro_id = "";
			$pro_number = "";
			$sub_moneyloan = "";
			$pro_redate = "";
			$pay_date = "";
			$pay_pice = "";
			$id_commit = "";
		}
	}
?>

						<div class="container">
						<h2><?=$mem_name?><p></h2>
						</div>
						<label for="id"><b>รหัสการจ่ายเงินให้ผู้กู้</b> : <?=$pay_id?></label><br>
						<label for="id"><b>รหัสสมาชิก</b> : <?=$mem_id?></label><br>
						<label for="id"><b>ชื่อ-สกุลสมาชิก</b> : <?=$mem_name?></label><br>
						<label for="id"><b>เลขที่บัตรประจำตัวประชาชาชน</b> : <?=$mem_idcard?></label><br>
						<label for="id"><b>รหัสการทำสัญญา</b> : <?=$pro_id?></label><br>
						<!-- <label class="col-md-5 control-label" for="id">เลขที่สัญญา</label><p><?//=$pro_number?></p> -->
						<label for="id"><b>จำนวนเงินกู้</b> : <?php echo number_format($sub_moneyloan);?> บาท</label><br>
						<label for="id"><b>วันที่ครบกำหนดส่ง</b> : <?=$pro_redate?></label><br>
						<label for="id"><b>วันที่จ่ายเงินกู้</b> : <?=$pay_date?></label><br>
						<label for="id"><b>จำนวนเงินที่จ่าย</b> : <?php echo number_format($pay_pice);?> บาท</label><br>
						<label for="id"><b>ชื่อกรรมการ</b> : <?=$id_commit?></label><br>



    </tbody>
</table>
