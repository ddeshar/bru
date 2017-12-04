<?php
$page = 'manager';
$title = 'manager Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/connect.php');
require_once('include/_sdate.php');

 include ("include/fcdate.php");
$startdate= (isset($_REQUEST['startdate'])) ? $_REQUEST['startdate']: '';
$enddate= (isset($_REQUEST['enddate'])) ? $_REQUEST['enddate']: '';

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="1;url=report_member.php"> <?php //code ปริ้น   ?>
<title>ระบบบริหารจัดการกองทุนหมู่บ้านและสัจจะออมทรัพย์</title>
</head>
<body  onload="window.print()"> <?php //code ปริ้น   ?>
<form  class="form-horizontal">
<center><img src="asset/img/logos.png" width="90" /></center>
</form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<center><font face = "TH SarabunPSK", size="6"><b>รายงานข้อมูลสมาชิก</b></font></center>
                <center><font face = "TH SarabunPSK", size="5">หมู่บ้านสวนครัว<br>
                																			73  ม.14  ตำบลอิสาณ  อำเภอเมือง  จังหวัดบุรีรัมย์ 31000 </font></center><br>

            <!--<table align="center">
                                <tr>
                                <td>ระหว่างวันที่</td>
                                    <td><?php //$strDate = "$startdate";	echo DateThai($strDate);?></td>
                                    <td>&nbsp;ถึงวันที่&nbsp;</td>
                                    <td><?php //$strDate = "$enddate";	echo DateThai($strDate);?></td>
									     </tr>
										</table>   <br>-->
        <table border="1" align="center" width="1000"  cellpadding="0"   cellspacing="0">
                                    <thead>
                                        <tr>


                                          <th><center>No.</center></th>
                                          <th>รหัสสมาชิก</th>
                                          <th>ชื่อ-สกุล</th>
                                          <th>เลขที่บัตรปชช.</th>
                                          <th>วัน/เดือน/ปีเกิด</th>
                                          <th>ที่อยู่</th>
                                          <th>เบอร์โทร</th>

                                        </tr>
                                    </thead>

                                    <?php

                                    $i=1;
                                    if (isset($_GET["mem_id"])) {
                                      $mem_id = $_GET["mem_id"];
                                      $sql = "delete from member where mem_id='$mem_id'";
                                      $result = mysqli_query($link, $sql);
                                    							}

                                                      $sql = "SELECT * FROM member
                                                              LEFT JOIN gender
                                                              ON member.id_gender = gender.id_gender
                                                              LEFT JOIN title
                                                              ON member.id_title = title.id_title
                                                              LEFT JOIN status
                                                              ON member.id_status = status.id_status
                                                              ORDER BY mem_id ASC	";

                                                              $result = mysqli_query($link, $sql);
                                                              while ($row = mysqli_fetch_array($result)){
                                                                $mem_id = $row["mem_id"];
                                                                $id_title = $row["title"];
                                                                $mem_name = $row["mem_name"];
                                                                $mem_idcard = $row["mem_idcard"];
                                                                $mem_birthday = $row["mem_birthday"];
                                                                $mem_address = $row["mem_address"];
                                                                $mem_tel = $row["mem_tel"];
                                                                $status_mem = $row["status_mem"];
                                    ?>
                                      									<tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$mem_id?></td>
                                                          <td><?=$id_title, $mem_name?></td>
                                                          <td><?=$mem_idcard?></td>
                                                          <td><?=$mem_birthday?></td>
                                                          <td><?=$mem_address?></td>
                                                          <td><?=$mem_tel?></td>
                                      							</tr>

                                            	 <?php
                                    			 $i++; }

                                    			 ?>


</body>
</html>
<?php //code ปริ้น   ?>
<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;
window.print();

document.body.innerHTML = originalContents;
}
</script>
