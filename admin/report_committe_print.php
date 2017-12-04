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
<meta http-equiv="refresh" content="1;url=report_committes.php"> <?php //code ปริ้น   ?>
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
                                          <th>รหัสกรรมการ</th>
                                          <th>ชื่อ-สกุล</th>
                                          <th>เลขที่บัตรปชช.</th>
                                          <th>วัน/เดือน/ปีเกิด</th>
                                          <th>ที่อยู่</th>
                                          <th>เบอร์โทร</th>
                                          <th>ตำแหน่ง</th>

                                        </tr>
                                    </thead>

                                    <?php

                                    $i=1;
                                    if (isset($_GET["id_committee"])) {
                                      $id_committee = $_GET["id_committee"];
                                      $sql = "delete from committee where id_committee='$id_committee'";
                                      $result = mysqli_query($link, $sql);
                                    }

                                    $sql = "SELECT * FROM committee
                                    LEFT JOIN title
                                    ON committee.id_title = title.id_title
                                    LEFT JOIN position
                                    ON committee.id_position = position.id_position
                                    ORDER BY id_committee ASC ";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_array($result)){
                                      $id_committee = $row["id_committee"];
                                      $id_title = $row["title"];
                                      $com_name = $row["com_name"];
                                      $com_idcard = $row["com_idcard"];
                                      $com_birthday = $row["com_birthday"];
                                      $name_position = $row["name_position"];
                                      $com_address = $row["com_address"];
                                      $com_tel = $row["com_tel"];
                                    ?>
                                      									<tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$id_committee?></td>
                                                          <td><?=$id_title, $com_name?></td>
                                                          <td><?=$com_idcard?></td>
                                                          <td><?=$com_birthday?></td>
                                                          <td><?=$com_address?></td>
                                                          <td><?=$com_tel?></td>
                                                          <td><?=$name_position?></td>
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
