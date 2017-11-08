<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลกรรมการ</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php
			if (isset($_GET["id_committee"])) {
					$id_committee = $_GET["id_committee"];
					$sql = "SELECT * FROM committee
					LEFT JOIN title
					ON committee.id_title = title.id_title
					LEFT JOIN position
					ON committee.id_position = position.id_position
					WHERE id_committee='$id_committee'
					 ";
					$result = mysqli_query($link, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						$id_committee = $row["id_committee"];
						$com_idcard = $row["com_idcard"];
						$id_title = $row["title"];
						$com_name = $row["com_name"];
						$id_position = $row["name_position"];
						$com_birthday = $row["com_birthday"];
						$com_address = $row["com_address"];
						$com_tel = $row["com_tel"];
						$com_username = $row["com_username"];
						$com_password = $row["com_password"];
					}else{
						$id_committee = "";
						$com_idcard = "";
						$id_title = "";
						$com_name = "";
						$id_position = "";
						$com_birthday = "";
						$com_address = "";
						$com_tel = "";
						$com_username = "";
						$com_password = "";
					}
				}
?>

						<div class="container">
							<h2><?=$id_title?> <?=$com_name?><p></h2>
						</div>
							<label for="id"><b>รหัสกรรมการ</b> : <?=$id_committee?></label><br>
							<label for="id"><b>เลขที่บัตรประชาชน</b> : <?=$com_idcard?></label><br>
							<label for="id"><b>คำนำหน้าชื่อ</b> : <?=$id_title?></label><br>
							<label for="id"><b>ชื่อ-สกุล</b> : <?=$com_name?></label><br>
							<label for="id"><b>ตำแหน่ง</b> : <?=$id_position?></label><br>
							<label for="id"><b>วันเกิด</b> : <?=$com_birthday?></label><br>
							<label for="id"><b>ที่อยู่</b> : <?=$com_address?></label><br>
							<label for="id"><b>เบอร์โทร</b> : <?=$com_tel?></label><br>
							<label for="id"><b>ชื่อผู้ใช้</b> : <?=$com_username?></label><br>
							<label for="id"><b>รหัสผ่าน</b> : <?=$com_password?></label><br>


    </tbody>
</table>
