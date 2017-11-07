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
              <label class="col-md-5 control-label" for="id">รหัสสมาชิก</label><p><?=$mem_id?></p>
              <label class="col-md-5 control-label" for="id">เลขที่บัตรประชาชน</label><p><?=$mem_idcard?></p>
              <label class="col-md-5 control-label" for="id">เพศ</label><p><?=$id_gender?></p>
              <label class="col-md-5 control-label" for="id">คำนำหน้าชื่อ</label><p><?=$id_title?></p>
              <label class="col-md-5 control-label" for="id">ชื่อ-สกุล</label><p><?=$mem_name?></p>
              <label class="col-md-5 control-label" for="id">วันเกิด</label><p><?=$mem_birthday?></p>
              <label class="col-md-5 control-label" for="id">สถานภาพ</label><p><?=$id_status?></p>
              <label class="col-md-5 control-label" for="id">อาชีพ</label><p><?=$mem_occupation?></p>
              <label class="col-md-5 control-label" for="id">ที่อยู่</label><p><?=$mem_address?></p>
              <label class="col-md-5 control-label" for="id">เบอร์โทร</label><p><?=$mem_tel?></p>
              <label class="col-md-5 control-label" for="id">อีเมล</label><p><?=$mem_email?></p>
              <label class="col-md-5 control-label" for="id">ชื่อผู้ใช้</label><p><?=$mem_username?></p>
              <label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?=$mem_password?></p>


    </tbody>
</table>
