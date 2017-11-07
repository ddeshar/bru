<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลกองทุน</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php
			if (isset($_GET["id_fund"])) {
					$id_fund = $_GET["id_fund"];
					$sql = "SELECT * FROM fund WHERE id_fund='$id_fund'";
					$result = mysqli_query($link, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						$id_fund = $row["id_fund"];
						$fund_name = $row["fund_name"];
						$fund_detail = $row["fund_detail"];
						$fund_money = $row["fund_money"];
					}else{
						$id_fund = "";
						$fund_name = "";
						$fund_detail = "";
						$fund_money = "";
					}
				}
?>

						<div class="container">
							<h2> <?=$fund_name?><p></h2>
						</div>
							<label class="col-md-5 control-label" for="id"> <b>รหัสกองทุน</b></label><p><?=$id_fund?></p>
							<label class="col-md-5 control-label" for="id"> <b>ชื่อกองทุน</b></label><p><?=$fund_name?></p>
							<label class="col-md-5 control-label" for="id"> <b>รายละเอียด</b></label><p><?=$fund_detail?></p>
							<label class="col-md-5 control-label" for="id"> <b>จำนวนเงิน</b></label><p><?=$fund_money?></p>


    </tbody>
</table>
