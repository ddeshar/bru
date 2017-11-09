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
      <tr>
        <th width="5%" align="left">รหัส</th>
        <th width="25%" align="left">วันที่ฝาก</th>

        <th width="20%" align="left">ชื่อผู้ฝาก</th>
        <th width="20%" align="left">ชื่อผู้รับฝาก</th>
        <th width="10%" align="left">เงินฝาก</th>
        <th width="10%" align="left">ถอน</th>
        <th width="10%" align="left">คงเหลือ</th>
      </tr>
      <?php

      														if (isset($_GET["mem_id"])) {
      																$mem_id = $_GET["mem_id"];
      																$sql = "SELECT DISTINCT deposit.mem_id,
      																member.mem_name,
      																deposit.fak_id,
      																deposit.fak_date,
      																deposit.fak_sum,
      																deposit.withdraw,
      																deposit.fak_total,
      																commits.name_commit
      																FROM deposit LEFT JOIN member
      																ON deposit.mem_id = member.mem_id
      																LEFT JOIN commits
      																ON deposit.id_commit = commits.id_commit WHERE deposit.mem_id = '$mem_id'
      																ORDER BY deposit.fak_id asc";
      																$result = mysqli_query($link, $sql);
      																while ($row = mysqli_fetch_array($result)) {
      																	$fak_id = $row["fak_id"];
      																	$fak_date = $row["fak_date"];
      																	$mem_id1 = $row["mem_id"];
      																	$name_commit = $row["name_commit"];
      																	$fak_sum = $row["fak_sum"];
      																	$withdraw = $row["withdraw"];
      																	$fak_total = $row["fak_total"];
      																	$mem_name = $row["mem_name"];

      																	echo "<tr>
      																	 		<td>$fak_id</td>
      																			<td>$fak_date</td>

      																			<td>$mem_name</td>
      																			<td>$name_commit</td>
      																			<td>$fak_sum</td>
      																			<td>$withdraw</td>
      																			<td>$fak_total</td>
      																	</tr>";
					}
				}
?>



    </tbody>
</table>
