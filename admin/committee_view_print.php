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
							<label class="col-md-5 control-label" for="id">รหัสกรรมการ</label><p><?=$id_committee?></p>
							<label class="col-md-5 control-label" for="id">เลขที่บัตรประชาชน</label><p><?=$com_idcard?></p>
							<label class="col-md-5 control-label" for="id">คำนำหน้าชื่อ</label><p><?=$id_title?></p>
							<label class="col-md-5 control-label" for="id">ชื่อ-สกุล</label><p><?=$com_name?></p>
							<label class="col-md-5 control-label" for="id">ตำแหน่ง</label><p><?=$id_position?></p>
							<label class="col-md-5 control-label" for="id">วันเกิด</label><p><?=$com_birthday?></p>
							<label class="col-md-5 control-label" for="id">ที่อยู่</label><p><?=$com_address?></p>
							<label class="col-md-5 control-label" for="id">เบอร์โทร</label><p><?=$com_tel?></p>
							<label class="col-md-5 control-label" for="id">ชื่อผู้ใช้</label><p><?=$com_username?></p>
							<label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?=$com_password?></p>


    </tbody>
</table>
