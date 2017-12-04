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
<meta http-equiv="refresh" content="1;url=report_promises.php"> <?php //code ปริ้น   ?>
<title>Embroidery Store Management System</title>
</head>
<body  onload="window.print()"> <?php //code ปริ้น   ?>
<form  class="form-horizontal">
<center><img src="asset/img/logos.png" width="90" /></center>
</form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<center><font face = "TH SarabunPSK", size="6"><b>รายงานการทำสัญญาเงินกู้</b></font></center>
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
                    <th align="center">ชื่อสกุล</th>
                     <th align="center">เงินที่อนุมัติ</th>
                     <th align="center">วันที่อนุมัติ</th>
                      <th align="center">วันที่ทำสัญญา</th>
                     <th align="center">	กำหนดส่ง </th>

                                        </tr>
                                    </thead>

                                    <?php
                                    $sum_app_pice=0;
                                    $i=1;
                                    if (isset($_GET["pro_id"])) {
                                    								$pro_id = $_GET["pro_id"];
                                    								$sql = "DELETE FROM promise WHERE pro_id ='$pro_id'";
                                    								$result = mysqli_query($link, $sql);
                                    							}

                                    $sql = "SELECT * FROM promise LEFT JOIN member ON promise.mem_id = member.mem_id
                                    WHERE  promise.pro_date BETWEEN '$startdate' AND '$enddate'
                                    GROUP BY
                                    promise.pro_id";
                                    $result = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_array($result)){
                                                    $pro_id = $row["pro_id"];
                                    								$mem_id = $row["mem_id"];
                                    								$mem_name = $row["mem_name"];
                                    								$app_pice = $row["app_pice"];
                                                    $sub_date = $row["sub_date"];
                                                    $pro_date = $row["pro_date"];
                                                    $pro_redate = $row["pro_redate"];


                                    ?>
                                      									<tr>
                                                          <td><?=$pro_id?></td>
                                                          <td><?=$mem_name?></td>
                                                          <td><?php echo number_format($app_pice);?></td>
                                                          <td><?php $strDate = "$sub_date";	echo DateThai($strDate);?></td>
                                                          <td><?php $strDate = "$pro_date";	echo DateThai($strDate);?></td>
                                                          <td><?php $strDate = "$pro_redate";	echo DateThai($strDate);?></td>


                                      							</tr>
                                            	 <?php
                                    			 $i++; }

                                    			 ?>
<?php
$sum_app_pice=0;
$i=1;
if (isset($_GET["pro_id"])) {
                $pro_id = $_GET["pro_id"];
                $sql = "DELETE FROM promise WHERE pro_id ='$pro_id'";
                $result = mysqli_query($link, $sql);
              }

$sql = "SELECT * FROM promise LEFT JOIN member ON promise.mem_id = member.mem_id
WHERE  promise.pro_date BETWEEN '$startdate' AND '$enddate'
GROUP BY
promise.pro_id";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_array($result)){
                $pro_id = $row["pro_id"];
                $mem_id = $row["mem_id"];
                $mem_name = $row["mem_name"];
                $app_pice = $row["app_pice"];
                $sub_date = $row["sub_date"];
                $pro_date = $row["pro_date"];
                $pro_redate = $row["pro_redate"];



$sum_app_pice = $sum_app_pice + $row["app_pice"];
//ราคารวมทั้งหมด
$i++; }

?>

<tfoot bgcolor="#fff">
<td></td>
<td align="center" class="style3"><b>รวม</td>
<td align="right" class="style3"><b> <?php echo  number_format("$sum_app_pice",2)?>&nbsp;&nbsp;บาท</td>
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
