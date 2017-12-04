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
<meta http-equiv="refresh" content="1;url=report_approves.php"> <?php //code ปริ้น   ?>
<title>ระบบบริหารจัดการกองทุนหมู่บ้านและสัจจะออมทรัพย์</title>
</head>
<body  onload="window.print()"> <?php //code ปริ้น   ?>
<form  class="form-horizontal">
<center><img src="asset/img/logos.png" width="90" /></center>
</form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<center><font face = "TH SarabunPSK", size="6"><b>รายงานข้อมูลการอนุมัติเงินกู้</b></font></center>
                <center><font face = "TH SarabunPSK", size="5">หมู่บ้านสวนครัว<br>
                																			73  ม.14  ตำบลอิสาณ  อำเภอเมือง  จังหวัดบุรีรัมย์ 31000 </font></center><br>

            <table align="center">
                                <tr>
                                <td>ระหว่างวันที่</td>
                                    <td><?php $strDate = "$startdate";	echo DateThai($strDate);?></td>
                                    <td>&nbsp;ถึงวันที่&nbsp;</td>
                                    <td><?php $strDate = "$enddate";	echo DateThai($strDate);?></td>
									     </tr>
										</table>   <br>
        <table border="1" align="center" width="1000"  cellpadding="0"   cellspacing="0">
                                    <thead>
                                        <tr>

                                          <th align="center">No.</th>
                                          <th>ชื่อ-สกุล</th>
                                          <th>จำนวนเงินทีอนุมัติ</th>
                                          <th>สถานะ</th>


                                        </tr>
                                    </thead>

                                    <?php

                                    $i=1;
                                    if (isset($_GET["sub_id"])) {
                                      $sub_id = $_GET["sub_id"];
                                      $sql = "delete from submitted where sub_id='$sub_id'";
                                      $result = mysqli_query($link, $sql);
                                    }

                                    $sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp
                                    WHERE status_app = 'อนุมัติ' AND submitted.sub_date BETWEEN '$startdate' AND '$enddate'
                                    GROUP BY
                                    submitted.sub_id order by submitted.sub_date asc
                                    ";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_array($result)){
                                      $sub_id = $row["sub_id"];
                                      $mem_id = $row["mem_id"];
                                      $mem_name = $row["mem_name"];
                                      $sub_moneyloan = $row["sub_moneyloan"];
                                      $sub_date = $row["sub_date"];
                                      $id_sapp = $row["status_app"];
                                    ?>
                                      									<tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$mem_name?></td>
                                                          <td><?php echo number_format($sub_moneyloan);?></td>
                                                          <td><?php $strDate = "$sub_date";	echo DateThai($strDate);?></td>
                                                          <td><?=$id_sapp?></td>
                                      							</tr>
                                                    
                                            	 <?php
                                    			 $i++; }

                                    			 ?>
<?php
$sum_approve=0;
$i=1;
if (isset($_GET["sub_id"])) {
  $sub_id = $_GET["sub_id"];
  $sql = "delete from submitted where sub_id='$sub_id'";
  $result = mysqli_query($link, $sql);
}
$sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp
WHERE status_app = 'อนุมัติ' AND submitted.sub_date BETWEEN '$startdate' AND '$enddate'
GROUP BY
submitted.sub_id order by submitted.sub_date asc
";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)){
  $sub_id = $row["sub_id"];
  $mem_id = $row["mem_id"];
  $mem_name = $row["mem_name"];
  $sub_moneyloan = $row["sub_moneyloan"];
  $sub_date = $row["sub_date"];
  $id_sapp = $row["status_app"];



$sum_approve = $sum_approve + $row["sub_moneyloan"];
//ราคารวมทั้งหมด
$i++; }

?>

<tfoot bgcolor="#fff">
<td></td>
<td align="center" class="style3"><b>รวม</td>
<td align="right" class="style3"><b> <?php echo  number_format("$sum_approve",2)?>&nbsp;&nbsp;บาท</td>
<td></td>
</tfoot>
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
