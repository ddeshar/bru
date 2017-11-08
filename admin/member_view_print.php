<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลสมาชิก</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php
      if (isset($_GET["mem_id"])) {
      		$mem_id = $_GET["mem_id"];
      		$sql = "SELECT * FROM member
      						LEFT JOIN gender
      						ON member.id_gender = gender.id_gender
      						LEFT JOIN title
      						ON member.id_title = title.id_title
      						LEFT JOIN status
      						ON member.id_status = status.id_status WHERE member.mem_id = '$mem_id'
      						ORDER BY mem_id ASC
      		";
      		$result = mysqli_query($link, $sql);
      		if (mysqli_num_rows($result) > 0) {
      			$row = mysqli_fetch_array($result);
      			$mem_id = $row["mem_id"];
      			$mem_idcard = $row["mem_idcard"];
      			$id_gender = $row["gender_name"];
      			$id_title = $row["title"];
      			$mem_name = $row["mem_name"];
      			$mem_birthday = $row["mem_birthday"];
      			$id_status = $row["status_name"];
      			$mem_occupation = $row["mem_occupation"];
      			$mem_address =$row["mem_address"];
      			$mem_tel = $row["mem_tel"];
      			$mem_email = $row["mem_email"];
      			$mem_username = $row["mem_username"];
      			$mem_password = $row["mem_password"];
      		}else{
      			$mem_id = "";
      			$mem_idcard = "";
      			$id_gender = "";
      			$id_title = "";
      			$mem_name = "";
      			$mem_birthday = "";
      			$id_status = "";
      			$mem_occupation ="";
      			$mem_address = "";
      			$mem_tel = "";
      			$mem_email = "";
      			$mem_username = "";
      			$mem_password = "";

					}
				}
?>

						<div class="container">
              <h2><?=$id_title?> <?=$mem_name?><p></h2>
            </div>
              <label for="id"><b>รหัสสมาชิก</b> : <?=$mem_id?></label><br>
              <label for="id"><b>เลขที่บัตรประชาชน</b> : <?=$mem_idcard?></label><br>
              <label for="id"><b>เพศ</b> : <?=$id_gender?></label><br>
              <label for="id"><b>คำนำหน้าชื่อ</b> : <?=$id_title?></label><br>
              <label for="id"><b>ชื่อ-สกุล</b> : <?=$mem_name?></label><br>
              <label for="id"><b>วันเกิด</b> : <?=$mem_birthday?></label><br>
              <label for="id"><b>สถานภาพ</b> : <?=$id_status?></label><br>
              <label for="id"><b>อาชีพ</b> : <?=$mem_occupation?></label><br>
              <label for="id"><b>ที่อยู่</b> : <?=$mem_address?></label><br>
              <label for="id"><b>เบอร์โทร</b> : <?=$mem_tel?></label><br>
              <label for="id"><b>อีเมล</b> : <?=$mem_email?></label><br>
              <label for="id"><b>ชื่อผู้ใช้</b> : <?=$mem_username?></label><br>
              <label for="id"><b>รหัสผ่าน</b> : <?=$mem_password?></label><br>


    </tbody>
</table>
