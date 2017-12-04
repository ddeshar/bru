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
<meta http-equiv="refresh" content="1;url=report_deposit.php"> <?php //code ปริ้น   ?>
<title>ระบบบริหารจัดการกองทุนหมู่บ้านและสัจจะออมทรัพย์</title>
</head>
<body  onload="window.print()"> <?php //code ปริ้น   ?>
<form  class="form-horizontal">
<center><img src="asset/img/logos.png" width="90" /></center>
</form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<center><font face = "TH SarabunPSK", size="6"><b>รายงานข้อมูลการฝาก - ถอนเงินสัจจะออมทรัพย์</b></font></center>
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
                                          <th>ชื่อ - สกุล</th>
                                          <th><div align='center'>ฝาก</div></th>
                                          <th><div align='center'>ถอน</div></th>
                                          <th><div align='center'>ยอดเงินคงเหลือ</div></th>
                                          <th>วันที่</th>


                                        </tr>
                                    </thead>

                                    <?php

                                    $i=1;
                                    if (isset($_GET["fak_id"])) {
                                      $fak_id = $_GET["fak_id"];
                                      $sql = "DELETE FROM deposit WHERE fak_id='$fak_id'";
                                      $result = mysqli_query($link, $sql);
                                    }

                                    $sql = "SELECT DISTINCT deposit.mem_id,
                                    member.mem_name,
                                    deposit.fak_date,
                                    deposit.fak_sum,
                                    deposit.withdraw,
                                    deposit.fak_total,
                                    commits.name_commit
                                    FROM deposit left JOIN member
                                    ON deposit.mem_id = member.mem_id
                                    left JOIN commits
                                    ON deposit.id_commit = commits.id_commit
                                    WHERE deposit.fak_date BETWEEN '$startdate' AND '$enddate'
                                    GROUP BY
                                    deposit.fak_id order by deposit.fak_date asc
                                    ";

                                      $result = mysqli_query($link, $sql);
                                      while ($row = mysqli_fetch_array($result)){
                                        $mem_id = $row["mem_id"];
                                        $fak_date = $row["fak_date"];
                                        $mem_name = $row["mem_name"];
                                        $name_commit = $row["name_commit"];
                                        $fak_sum = $row["fak_sum"];
                                        $withdraw = $row["withdraw"];
                                        $fak_total = $row["fak_total"];
                                    ?>
                                      									<tr>
                                                          <td><?=$i?></td>

                                                          <td><?=$mem_name?></td>
                                                          <td><?php echo number_format($fak_sum);?></td>
                                                          <td><?php echo number_format($withdraw);?></td>
                                                          <td><?php echo number_format($fak_total);?></td>
                                                          <td><?php $strDate = "$fak_date";	echo DateThai($strDate);?></td>


                                      							</tr>

                                            	 <?php
                                    			 $i++; }

                                    			 ?>
<?php
$sum_fak_total=0;
$sum_withdraw=0;
$i=1;
if (isset($_GET["fak_id"])) {
  $fak_id = $_GET["fak_id"];
  $sql = "DELETE FROM deposit WHERE fak_id='$fak_id'";
  $result = mysqli_query($link, $sql);
}

$sql = "SELECT DISTINCT deposit.mem_id,
member.mem_name,
deposit.fak_date,
deposit.fak_sum,
deposit.withdraw,
deposit.fak_total,
commits.name_commit
FROM deposit left JOIN member
ON deposit.mem_id = member.mem_id
left JOIN commits
ON deposit.id_commit = commits.id_commit
WHERE deposit.fak_date BETWEEN '$startdate' AND '$enddate'
GROUP BY
deposit.fak_id order by deposit.fak_date asc
";

  $result = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($result)){
    $mem_id = $row["mem_id"];
    $fak_date = $row["fak_date"];
    $mem_name = $row["mem_name"];
    $name_commit = $row["name_commit"];
    $fak_sum = $row["fak_sum"];
    $withdraw = $row["withdraw"];
    $fak_total = $row["fak_total"];


$sum_fak_total = $sum_fak_total + $row["fak_sum"];
$sum_withdraw = $sum_withdraw + $row["withdraw"];
//ราคารวมทั้งหมด
$i++; }

?>



<tfoot bgcolor="#fff">
<td></td>
<td align="center" class="style3">
<td align="center" class="style3"><b>รวมเงินฝาก <?php echo  number_format("$sum_fak_total",2)?>&nbsp;&nbsp;บาท</td>
  <td align="center" class="style3"><b>รวมเงินถอน <?php echo  number_format("$sum_withdraw",2)?>&nbsp;&nbsp;บาท</td>
<td></td>
<td></td>
<td></td>
</tfoot>
</body>
</html><?php //code ปริ้น   ?>
<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;
window.print();

document.body.innerHTML = originalContents;
}
</script>
