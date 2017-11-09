<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการชำระเงินกู้และดอกเบี้ย</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>

    <tr>
	<th width="8%" align="left">รหัส</th>
	<th width="18%" align="left">วันที่ชำระ</th>
	<th width="13%" align="left">รหัสสมาชิก</th>
	<th width="20%" align="left">ชื่อสมาชิก</th>
	<th width="18%" align="left">จำนวนเงินกู้</th>
	<th width="13%" align="left">ชำระ</th>
	<th width="13%" align="left">คงเหลือ</th>
	</tr>
      <?php
if (isset($_GET["ref_id"])){
    $mem_id = $_GET["ref_id"];
    $sql = "SELECT * FROM refund
    LEFT JOIN member ON refund.mem_id = member.mem_id
    LEFT JOIN commits ON refund.id_commit = commits.id_commit
    WHERE refund.mem_id='$mem_id'";

    $result = mysqli_query($link, $sql);
  	while ($row = mysqli_fetch_assoc($result)) {
	$ref_id = $row["ref_id"];
    $ref_date = $row["ref_date"];
	$mem_id = $row["mem_id"];
	$mem_name = $row["mem_name"];
	$sub_moneyloan = $row["sub_moneyloan"];
	$pay = $row["pay"];
	$owe = $row["owe"];

	echo "<tr>
	<td>$ref_id</td>
    <td>$ref_date</td>
	<td>$mem_id</td>
	<td>$mem_name</td>
	<td>$sub_moneyloan</td>
	<td>$pay</td>
	<td>$owe</td>
	</tr>";
		}
	}
?>



    </tbody>
</table>
