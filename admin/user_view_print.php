<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลผู้เข้าใช้ระบบ</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">

    <tbody>
      <?php
			if (isset($_GET["user_id"])) {
					$user_id = $_GET["user_id"];
					$sql = "SELECT * FROM tbl_users WHERE user_id='$user_id'";
					$result = mysqli_query($link, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						$user_id = $row["user_id"];
						$username = $row["username"];
						$password = $row["password"];
						$email = $row["email"];
						$status = $row["status"];
					}else{
						$user_id = "";
						$username = "";
						$password = "";
						$email = "";
						$status = "";
					}
				}
?>

						<div class="container">
							<h2> <?=$username?><p></h2>
						</div>
							<label class="col-md-5 control-label" for="id"> <b>รหัส</b></label><p><?=$user_id?></p>
							<label class="col-md-5 control-label" for="id"><b>ชื่อผู้ใช้</b></label><p><?=$username?></p>
							<!-- ไม่ควรแสดงรหัวผ่าน -->
							<!-- <label class="col-md-5 control-label" for="id">รหัสผ่าน</label><p><?//$password?></p> -->
							<label class="col-md-5 control-label" for="id"><b>อีเมล</b></label><p><?=$email?></p>
							<label class="col-md-5 control-label" for="id"><b>สถานะ</b></label><p><?=$status?></p>


    </tbody>
</table>
